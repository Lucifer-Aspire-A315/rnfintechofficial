<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LoanApplications;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAllLoanApplicationsTest extends TestCase
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
    public function it_gets_user_all_loan_applications(): void
    {
        $user = User::factory()->create();
        $allLoanApplications = LoanApplications::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.all-loan-applications.index', $user)
        );

        $response
            ->assertOk()
            ->assertSee($allLoanApplications[0]->name_of_applicant);
    }

    /**
     * @test
     */
    public function it_stores_the_user_all_loan_applications(): void
    {
        $user = User::factory()->create();
        $data = LoanApplications::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.all-loan-applications.store', $user),
            $data
        );

        $this->assertDatabaseHas('loan_applications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $loanApplications = LoanApplications::latest('id')->first();

        $this->assertEquals($user->id, $loanApplications->user_id);
    }
}
