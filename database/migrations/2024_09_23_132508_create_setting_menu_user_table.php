<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingMenuUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_menu_user', function (Blueprint $table) {
            $table->id('NO_SETTING');
            $table->unsignedBigInteger('ID_JENIS_USER'); // foreign key ke jenis_user
            $table->unsignedBigInteger('MENU_ID');       // foreign key ke menu
            $table->unsignedBigInteger('CREATE_BY')->nullable(); // foreign key ke user yang membuat
            $table->timestamp('CREATE_DATE')->nullable();
            $table->unsignedBigInteger('UPDATE_BY')->nullable(); // foreign key ke user yang mengupdate
            $table->timestamp('UPDATE_DATE')->nullable();
            $table->boolean('DELETE_MARK')->default(false);

            // Foreign key constraints
            $table->foreign('ID_JENIS_USER')->references('id')->on('jenis_user')->onDelete('cascade');
            $table->foreign('MENU_ID')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_menu_user');
    }
}
