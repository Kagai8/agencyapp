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
        Schema::table('one_time_purchases', function (Blueprint $table) {
            //
            $table->string('payment_option')->after('net_amount')->nullable();
            $table->string('transaction_code')->after('payment_option')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('one_time_purchases', function (Blueprint $table) {
            //
        });
    }
};
