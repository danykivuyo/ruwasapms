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
        Schema::create('meter_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meter_id');
            $table->string('time');
            $table->string('message');
            $table->string('status');
            $table->string('meter');
            $table->timestamps();

            $table->foreign('meter_id')
                ->references('id')
                ->on('meters')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meter_logs');
    }
};
