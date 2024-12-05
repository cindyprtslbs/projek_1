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
        Schema::create('emitens', function (Blueprint $table) {
            $table->string('STOCK_CODE', 4)->primary();
            $table->string('STOCK_NAME', 100);
            $table->bigInteger('SHARED');
            $table->string('SEKTOR', 60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emitens');
    }
};
