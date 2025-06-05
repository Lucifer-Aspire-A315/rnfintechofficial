<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('loan_applications', 'bank_statement')) {
                $table->string('bank_statement')->nullable();
            }
            if (!Schema::hasColumn('loan_applications', 'salary_slip')) {
                $table->string('salary_slip')->nullable();
            }
            if (!Schema::hasColumn('loan_applications', 'electricity_bill')) {
                $table->string('electricity_bill')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->dropColumn(['bank_statement', 'salary_slip', 'electricity_bill']);
        });
    }
};
