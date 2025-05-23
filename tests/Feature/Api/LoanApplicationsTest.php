<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LoanApplications;

use App\Models\Bank;
use App\Models\LoanType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanApplicationsTest extends TestCase
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
    public function it_gets_all_loan_applications_list(): void
    {
        $allLoanApplications = LoanApplications::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-loan-applications.index'));

        $response
            ->assertOk()
            ->assertSee($allLoanApplications[0]->name_of_applicant);
    }

    /**
     * @test
     */
    public function it_stores_the_loan_applications(): void
    {
        $data = LoanApplications::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-loan-applications.store'),
            $data
        );

        $this->assertDatabaseHas('loan_applications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_loan_applications(): void
    {
        $loanApplications = LoanApplications::factory()->create();

        $user = User::factory()->create();
        $loanType = LoanType::factory()->create();
        $bank = Bank::factory()->create();

        $data = [
            'name_of_applicant' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber(),
            'amount' => $this->faker->randomNumber(2),
            'pan_number' => $this->faker->text(255),
            'adhar_number' => $this->faker->text(255),
            'adhar_image' => $this->faker->text(255),
            'pincode' => $this->faker->text(255),
            'status' => 'pending',
            'reason_of_rejection' => $this->faker->text(255),
            'user_id' => $user->id,
            'loan_type_id' => $loanType->id,
            'bank_id' => $bank->id,
        ];

        $response = $this->putJson(
            route('api.all-loan-applications.update', $loanApplications),
            $data
        );

        $data['id'] = $loanApplications->id;

        $this->assertDatabaseHas('loan_applications', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_loan_applications(): void
    {
        $loanApplications = LoanApplications::factory()->create();

        $response = $this->deleteJson(
            route('api.all-loan-applications.destroy', $loanApplications)
        );

        $this->assertSoftDeleted($loanApplications);

        $response->assertNoContent();
    }
}
