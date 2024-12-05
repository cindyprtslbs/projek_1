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
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_hp')->nullable();
            $table->string('pin')->nullable();
            $table->unsignedBigInteger('id_jenis_user')->default(1); // Memastikan kolom id_jenis_user sudah ada
            $table->string('status_user')->nullable();
            $table->unsignedBigInteger('create_by')->nullable();
            $table->timestamp('create_date')->nullable();
            $table->unsignedBigInteger('update_by')->nullable();
            $table->timestamp('update_date')->nullable();

            // Menambahkan foreign key untuk id_jenis_user
            $table->foreign('id_jenis_user')->references('id')->on('jenis_user')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_jenis_user']);
            $table->dropColumn('no_hp');
            $table->dropColumn('pin');
            $table->dropColumn('id_jenis_user');
            $table->dropColumn('status_user');
            $table->dropColumn('create_by');
            $table->dropColumn('create_date');
            $table->dropColumn('update_by');
            $table->dropColumn('update_date');
        });
    }
};
