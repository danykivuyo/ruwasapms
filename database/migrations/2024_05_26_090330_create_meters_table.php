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
        Schema::create('meters', function (Blueprint $table) {
            $table->id();
            $table->string('meter_id');
            $table->string('meter_number');
            $table->string('type');
            $table->string('balance');
            $table->boolean('status')->default(1);
            $table->string('region');
            $table->string('district');
            $table->string('cbwso');
            $table->string('lat');
            $table->string('lon');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meters');
    }
};
