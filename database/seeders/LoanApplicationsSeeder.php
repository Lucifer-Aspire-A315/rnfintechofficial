<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoanApplications;

class LoanApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoanApplications::factory()
            ->count(5)
            ->create();
    }
}
