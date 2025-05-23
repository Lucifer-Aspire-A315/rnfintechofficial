<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\LoanType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanTypeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_loan_types(): void
    {
        $loanTypes = LoanType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('loan-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.loan_types.index')
            ->assertViewHas('loanTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_loan_type(): void
    {
        $response = $this->get(route('loan-types.create'));

        $response->assertOk()->assertViewIs('app.loan_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_loan_type(): void
    {
        $data = LoanType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('loan-types.store'), $data);

        $this->assertDatabaseHas('loan_types', $data);

        $loanType = LoanType::latest('id')->first();

        $response->assertRedirect(route('loan-types.edit', $loanType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_loan_type(): void
    {
        $loanType = LoanType::factory()->create();

        $response = $this->get(route('loan-types.show', $loanType));

        $response
            ->assertOk()
            ->assertViewIs('app.loan_types.show')
            ->assertViewHas('loanType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_loan_type(): void
    {
        $loanType = LoanType::factory()->create();

        $response = $this->get(route('loan-types.edit', $loanType));

        $response
            ->assertOk()
            ->assertViewIs('app.loan_types.edit')
            ->assertViewHas('loanType');
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

        $response = $this->put(route('loan-types.update', $loanType), $data);

        $data['id'] = $loanType->id;

        $this->assertDatabaseHas('loan_types', $data);

        $response->assertRedirect(route('loan-types.edit', $loanType));
    }

    /**
     * @test
     */
    public function it_deletes_the_loan_type(): void
    {
        $loanType = LoanType::factory()->create();

        $response = $this->delete(route('loan-types.destroy', $loanType));

        $response->assertRedirect(route('loan-types.index'));

        $this->assertModelMissing($loanType);
    }
}
