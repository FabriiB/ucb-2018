<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixMenu1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->dropColumn('id_administrator');
            $table->integer('id_user')->after('status');
            $table->foreign('id_user')->references('id')->on('users');
            $table->renameColumn('date_update', 'date_end');
        });
        Schema::table('menu_dish', function (Blueprint $table) {
            $table->string('status')->after('date_end');
        });
        Schema::table('drink', function (Blueprint $table) {
            $table->dropForeign('drink_id_menu_drink_foreign');
            $table->dropForeign('drink_id_administrator_foreign');
            $table->dropColumn('id_administrator');
        });
        Schema::table('menu_drink', function (Blueprint $table) {
            $table->dropForeign('menu_drink_id_menu_foreign');
        });
        Schema::drop('menu_drink');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->string('id_administrator');
            $table->dropForeign('menu_id_user_foreign');
            $table->dropColumn('id_user');
        });
        Schema::table('menu_dish', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
        Schema::create('menu_drink', function (Blueprint $table) {
            $table->increments('id_menu_drink')->unique();
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->integer('id_menu');
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host',50)->nullable();
            $table->string('transaction_user',50)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
