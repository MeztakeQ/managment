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
        Schema::table('entris', function (Blueprint $table) {
            $table->string('original_name')->nullable();
            $table->unsignedBigInteger('size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entris', function (Blueprint $table) {
            $table->dropColumn('original_name');
            $table->dropColumn('size');
        });
    }
};
