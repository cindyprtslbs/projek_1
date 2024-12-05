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
        Schema::create('transaksi_harians', function (Blueprint $table) {
            $table->id('NO_RECORDS');
            $table->string('STOCK_CODE', 4);
            $table->date('DATE_TRANSACTION');
            $table->bigInteger('OPEN');
            $table->bigInteger('HIGH');
            $table->bigInteger('LOW');
            $table->bigInteger('CLOSE');
            $table->Integer('CHANGE');
            $table->bigInteger('VOLUME');
            $table->bigInteger('VALUE');
            $table->bigInteger('FREQUENCY');

            $table->foreign('STOCK_CODE')
                  ->references('STOCK_CODE')
                  ->on('emitens')
                  ->onDelete('cascade');

            $table->index(['STOCK_CODE', 'DATE_TRANSACTION']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_harians');
    }
};
