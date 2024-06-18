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
        Schema::create('cbwsos', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('district');
            $table->string('name');
            $table->string('tarrif')->default('1000');
            $table->string('daily_income')->default('0');
            $table->string('monthly_income')->default('0');
            $table->string('yearly_income')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cbwsos');
    }
};
