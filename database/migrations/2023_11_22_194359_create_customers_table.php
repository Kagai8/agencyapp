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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone_no')->nullable();
            $table->string('customer_kra_pin')->nullable();
            $table->string('customer_gender')->nullable();
            $table->string('customer_national_id')->nullable();
            $table->string('customer_contact_person_name')->nullable();
            $table->string('customer_contact_person_email')->nullable();
            $table->string('customer_contact_person_phone')->nullable();
            $table->string('customer_premium_price')->nullable();
            $table->string('customer_credit_limit')->nullable();
            $table->string('customer_discount')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
