<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Catalogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entity');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('catalogue_id')->unsigned();
            $table->integer('level_id');
            $table->integer('boss_id');
        });

        Schema::create('level', function (Blueprint $table) {
            $table->integer('level_id');
            $table->integer('boss_id');
        });

        Schema::table('items', function(Blueprint $table){
            #falta product#
            $table->foreign('catalogue_id')->references('id')->on('catalogue');
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
