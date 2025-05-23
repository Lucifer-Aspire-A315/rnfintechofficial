<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name_of_applicant');
            $table->string('phone');
            $table->double('amount');
            $table->string('pan_number');
            $table->string('pan_image')->default('tete');
            $table->string('adhar_number');
            $table->string('adhar_image')->default('tete');
            $table->string('bank_statement')->nullable();
            $table->string('salary_slip')->nullable();
            $table->string('electricity_bill')->nullable();
            $table->string('pincode');
            $table->enum('status', [
                'pending',
                'inreview',
                'completed',
                'rejected',
            ]);
            $table->string('reason_of_rejection')->nullable();
            $table->unsignedBigInteger('loan_type_id');
            $table->unsignedBigInteger('bank_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
