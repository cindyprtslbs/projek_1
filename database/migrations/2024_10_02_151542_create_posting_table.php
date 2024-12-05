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
        Schema::create('posting', function (Blueprint $table) {
            $table->string('POSTING_ID', 30)->primary();
            $table->string('SENDER', 30);
            $table->text('MESSAGE_TEXT');
            $table->string('MESSAGE_GAMBAR', 200)->nullable();
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE')->useCurrent();
            $table->string('DELETE_MARK', 1)->nullable();
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting');
    }
};
