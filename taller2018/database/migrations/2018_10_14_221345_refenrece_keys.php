<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefenreceKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('idPlan')->references('id_plan')->on('plan');
        });
        Schema::table('bill', function (Blueprint $table) {
            $table->foreign('idUser')->references('id_user')->on('users');
            $table->foreign('idCompany')->references('id_company')->on('company');
        });
        Schema::table('plan', function (Blueprint $table) {
            $table->foreign('id_drink_plan')->references('id_plan_drink')->on('plan_drink');
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
