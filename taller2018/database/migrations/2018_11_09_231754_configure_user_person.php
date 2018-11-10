<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigureUserPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name2');
            $table->dropColumn('address2');
            $table->dropColumn('address1');
            $table->dropColumn('mobile');
            $table->dropColumn('phone');
            $table->dropColumn('id_plan');
            $table->integer('tx_id')->nullable();
            $table->timestamp('tx_date')->nullable();
            $table->string('tx_host')->nullable();
            $table->string('tx_user')->nullable();
            $table->boolean('is_admin')->default(false);


        });

        Schema::table('person', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->integer('dishes')->default(0)->nullable();
            $table->integer('tx_id')->nullable();
            $table->timestamp('tx_date')->nullable();
            $table->string('tx_host')->nulllable();
            $table->string('tx_user')->nullable();
            $table->integer('id_plan')->unsigned();
            $table->foreign('id_plan')->references('id_plan')->on('plan');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

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
