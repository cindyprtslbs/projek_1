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
        Schema::create('jenis_user', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_user');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->timestamp('create_date')->nullable();
            $table->boolean('delete_mark')->default(false);
            $table->unsignedBigInteger('update_by')->nullable();
            $table->timestamp('update_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_user');
    }
};
