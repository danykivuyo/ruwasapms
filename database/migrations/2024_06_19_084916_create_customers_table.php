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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meter_id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('house_number')->nullable();
            $table->string('tag_id');
            $table->string('balance');
            $table->timestamps();

            $table->foreign('meter_id')
                ->references('id')
                ->on('meters');
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
