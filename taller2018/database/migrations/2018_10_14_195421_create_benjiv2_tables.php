<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenjiv2Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provider_product', function (Blueprint $table) {

            $table->foreign('id_provider')->references('id_provider')->on('provider');

            $table->foreign('id_product')->references('id_product')->on('product');
            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');

        });
        Schema::table('menu', function (Blueprint $table) {

            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');

        });
        Schema::create('menu_dish', function (Blueprint $table) {

            $table->foreign('id_menu')->references('id_menu')->on('menu');

            $table->foreign('id_dish')->references('id_dish')->on('dish');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider');
        Schema::dropIfExists('provider_product');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('menu_dish');
        Schema::dropIfExists('administrator');

    }
}
