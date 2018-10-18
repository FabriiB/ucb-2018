<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Benjiv5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provider_product', function (Blueprint $table) {
            $table->integer('id_provider');
            $table->foreign('id_provider')->references('id_provider')->on('provider');
            $table->integer('id_product');
            $table->foreign('id_product')->references('id_product')->on('product');
            $table->integer('id_administrator');
            $table->foreign('id_administrator')->references('id_administrator')->on('administrator');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
