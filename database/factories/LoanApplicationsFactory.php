<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LoanApplications;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanApplicationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoanApplications::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_of_applicant' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber(),
            'amount' => $this->faker->randomNumber(2),
            'pan_number' => $this->faker->text(255),
            'adhar_number' => $this->faker->text(255),
            'adhar_image' => $this->faker->text(255),
            'pincode' => $this->faker->text(255),
            'status' => 'pending',
            'reason_of_rejection' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'loan_type_id' => \App\Models\LoanType::factory(),
            'bank_id' => \App\Models\Bank::factory(),
        ];
    }
}
