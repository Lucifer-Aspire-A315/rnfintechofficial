<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user if not exists
        \App\Models\User::firstOrCreate(
            ['phone' => '7420857282'],
            [
                'name' => 'RN FinTech Admin',
                'email' => 'admin@admin.com',
                'password' => \Hash::make('RNFinTech@123'),
                'role' => 'admin',
            ]
        );

        $this->call(PermissionsSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(LoanApplicationsSeeder::class);
        $this->call(LoanTypeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
