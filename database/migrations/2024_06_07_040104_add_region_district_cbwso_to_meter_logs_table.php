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
        Schema::table('meter_logs', function (Blueprint $table) {
            //
            $table->string("region");
            $table->string("district");
            $table->string("cbwso");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meter_logs', function (Blueprint $table) {
            //
            $table->dropColumn("region");
            $table->dropColumn("district");
            $table->dropColumn("cbwso");
        });
    }
};
