<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drink', function(Blueprint $table){
            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');
            $table->foreign('id_menu_drink')->references('id_menu_drink')->on('menu_drink');
            $table->foreign('id_meassure')->references('id_meassure')->on('meassure');
        });

        Schema::table('menu_drink', function(Blueprint $table){
            $table->foreign('id_menu')->references('id_menu')->on('menu');
        });

        Schema::table('recipe', function(Blueprint $table){
            #falta de la tabla dish#
            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');
        });

        Schema::table('conversion', function(Blueprint $table){
            
            $table->foreign('id_meassure1')->references('id_meassure')->on('meassure');
            $table->foreign('id_meassure2')->references('id_meassure')->on('meassure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink');
        Schema::dropIfExists('menu_drink');
        Schema::dropIfExists('recipe');
        Schema::dropIfExists('conversion');
    }
}
