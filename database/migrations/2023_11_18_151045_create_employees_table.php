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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('employee_name')->nullable();
            $table->string('employee_email')->nullable();
            $table->string('employee_phone_no')->nullable();
            $table->string('date_joined')->nullable();
            $table->string('employee_kra_pin')->nullable();
            $table->string('nhif_no')->nullable();
            $table->string('employee_nssf_no')->nullable();
            $table->string('employee_designation')->nullable();
            $table->string('employee_gender')->nullable();
            $table->string('employee_national_id')->nullable();
            $table->string('employee_image')->nullable();
            $table->string('employee_bank_name')->nullable();
            $table->string('employee_bank_branch')->nullable();
            $table->string('employee_bank_acc_no')->nullable();
            $table->string('employee_basic_salary')->nullable();
            $table->string('employee_housing_allowance')->nullable();
            $table->string('employee_comission')->nullable();
            $table->string('other_allowances')->nullable();
            $table->string('employee_bonuses')->nullable();
            $table->string('employee_paye')->nullable();
            $table->string('employee_nssf')->nullable();
            $table->string('employee_nhif')->nullable();
            $table->string('employee_cotu')->nullable();
            $table->string('employee_loans')->nullable();
            $table->string('days_worked')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
