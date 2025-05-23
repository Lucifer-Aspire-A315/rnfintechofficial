<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LoanType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanTypeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_loan_types_list(): void
    {
        $loanTypes = LoanType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.loan-types.index'));

        $response->assertOk()->assertSee($loanTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_loan_type(): void
    {
        $data = LoanType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.loan-types.store'), $data);

        $this->assertDatabaseHas('loan_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_loan_type(): void
    {
        $loanType = LoanType::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(
            route('api.loan-types.update', $loanType),
            $data
        );

        $data['id'] = $loanType->id;

        $this->assertDatabaseHas('loan_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_loan_type(): void
    {
        $loanType = LoanType::factory()->create();

        $response = $this->deleteJson(
            route('api.loan-types.destroy', $loanType)
        );

        $this->assertModelMissing($loanType);

        $response->assertNoContent();
    }
}
