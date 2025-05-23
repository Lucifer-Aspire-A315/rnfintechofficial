<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LoanType;
use App\Models\LoanApplications;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanTypeAllLoanApplicationsTest extends TestCase
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
    public function it_gets_loan_type_all_loan_applications(): void
    {
        $loanType = LoanType::factory()->create();
        $allLoanApplications = LoanApplications::factory()
            ->count(2)
            ->create([
                'loan_type_id' => $loanType->id,
            ]);

        $response = $this->getJson(
            route('api.loan-types.all-loan-applications.index', $loanType)
        );

        $response
            ->assertOk()
            ->assertSee($allLoanApplications[0]->name_of_applicant);
    }

    /**
     * @test
     */
    public function it_stores_the_loan_type_all_loan_applications(): void
    {
        $loanType = LoanType::factory()->create();
        $data = LoanApplications::factory()
            ->make([
                'loan_type_id' => $loanType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.loan-types.all-loan-applications.store', $loanType),
            $data
        );

        $this->assertDatabaseHas('loan_applications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $loanApplications = LoanApplications::latest('id')->first();

        $this->assertEquals($loanType->id, $loanApplications->loan_type_id);
    }
}
