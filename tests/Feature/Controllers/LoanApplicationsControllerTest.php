<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\LoanApplications;

use App\Models\Bank;
use App\Models\LoanType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanApplicationsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_loan_applications(): void
    {
        $allLoanApplications = LoanApplications::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-loan-applications.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_loan_applications.index')
            ->assertViewHas('allLoanApplications');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_loan_applications(): void
    {
        $response = $this->get(route('all-loan-applications.create'));

        $response->assertOk()->assertViewIs('app.all_loan_applications.create');
    }

    /**
     * @test
     */
    public function it_stores_the_loan_applications(): void
    {
        $data = LoanApplications::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-loan-applications.store'), $data);

        $this->assertDatabaseHas('loan_applications', $data);

        $loanApplications = LoanApplications::latest('id')->first();

        $response->assertRedirect(
            route('all-loan-applications.edit', $loanApplications)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_loan_applications(): void
    {
        $loanApplications = LoanApplications::factory()->create();

        $response = $this->get(
            route('all-loan-applications.show', $loanApplications)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_loan_applications.show')
            ->assertViewHas('loanApplications');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_loan_applications(): void
    {
        $loanApplications = LoanApplications::factory()->create();

        $response = $this->get(
            route('all-loan-applications.edit', $loanApplications)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_loan_applications.edit')
            ->assertViewHas('loanApplications');
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

        $response = $this->put(
            route('all-loan-applications.update', $loanApplications),
            $data
        );

        $data['id'] = $loanApplications->id;

        $this->assertDatabaseHas('loan_applications', $data);

        $response->assertRedirect(
            route('all-loan-applications.edit', $loanApplications)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_loan_applications(): void
    {
        $loanApplications = LoanApplications::factory()->create();

        $response = $this->delete(
            route('all-loan-applications.destroy', $loanApplications)
        );

        $response->assertRedirect(route('all-loan-applications.index'));

        $this->assertSoftDeleted($loanApplications);
    }
}
