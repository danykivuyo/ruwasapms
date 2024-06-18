<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('app_id');
            $table->string('order_id')->nullable();
            $table->string('merchant_ref')->nullable();
            $table->string('reference')->nullable();
            $table->string('account_number');
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('amount');
            $table->string('currency');
            $table->string('provider');
            $table->string('message');
            $table->string('addded_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
