<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->integer('id_person')->unsigned()->nullable();
            $table->foreign('id_person')->references('id_person')->on('person')->nullable();
            $table->integer('id_menu_dish')->unsigned()->nullable();
            $table->foreign('id_menu_dish')->references('id_menu_dish')->on('menu_dish')->nullable();
        });

        Schema::table('person', function (Blueprint $table) {
            $table->dropForeign(['id_plan']);
            $table->dropColumn('id_plan');
        });

        Schema::table('payment', function (Blueprint $table) {
            $table->foreign('idUser')->references('id_person')->on('person');
            $table->foreign('idPlan')->references('id_plan')->on('plan');
        });

        Schema::table('bill', function (Blueprint $table) {
            $table->integer('id_payment')->unsigned();
            $table->foreign('id_payment')->references('idPayment')->on('payment');
        });

        Schema::table('order_delivery', function (Blueprint $table) {
            $table->foreign('idOrder')->references('idOrder')->on('order');
            $table->foreign('idDistributor')->references('idDistributor')->on('distributors');
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
