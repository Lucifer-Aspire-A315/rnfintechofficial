<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bank;
use App\Models\LoanApplications;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BankAllLoanApplicationsTest extends TestCase
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
    public function it_gets_bank_all_loan_applications(): void
    {
        $bank = Bank::factory()->create();
        $allLoanApplications = LoanApplications::factory()
            ->count(2)
            ->create([
                'bank_id' => $bank->id,
            ]);

        $response = $this->getJson(
            route('api.banks.all-loan-applications.index', $bank)
        );

        $response
            ->assertOk()
            ->assertSee($allLoanApplications[0]->name_of_applicant);
    }

    /**
     * @test
     */
    public function it_stores_the_bank_all_loan_applications(): void
    {
        $bank = Bank::factory()->create();
        $data = LoanApplications::factory()
            ->make([
                'bank_id' => $bank->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.banks.all-loan-applications.store', $bank),
            $data
        );

        $this->assertDatabaseHas('loan_applications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $loanApplications = LoanApplications::latest('id')->first();

        $this->assertEquals($bank->id, $loanApplications->bank_id);
    }
}
