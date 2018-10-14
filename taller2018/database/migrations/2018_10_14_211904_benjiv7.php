<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Benjiv7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->integer('id_administrator');
            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');
        });
        Schema::table('menu_dish', function (Blueprint $table) {
            $table->integer('id_menu');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            $table->integer('id_dish');
            $table->foreign('id_dish')->references('idDish')->on('dish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
