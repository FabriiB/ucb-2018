<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixMenu2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drink', function (Blueprint $table) {
            $table->integer('id_user')->after('type');
            $table->foreign('id_user')->references('id')->on('users');
            $table->dropColumn('id_menu_drink');
            $table->string('status',50);
            $table->string('description', 1000);
            $table->timestamp('date_created');
        });

        Schema::create('dish', function (Blueprint $table) {
            $table->increments('id_dish');
            $table->string('name',100);
            $table->string('description',1000);
            $table->integer('portion');
            $table->timestamp('date_created');
            $table->string('images')->nullable();
            $table->string('status', 50);
            $table->string('type', 50);
            $table->string('tip', 200)->nullable();
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::table('menu_dish', function (Blueprint $table) {
            $table->foreign('id_dish')->references('id_dish')->on('dish');
        });
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id_step');
            $table->string('title',100);
            $table->string('description',1000);
            $table->timestamp('date_created');
            $table->string('images')->nullable();
            $table->string('status', 50);
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::create('instructions', function (Blueprint $table) {
            $table->increments('id_instruction');
            $table->integer('time');
            $table->timestamp('date_created');
            $table->string('type', 50);
            $table->integer('id_dish');
            $table->foreign('id_dish')->references('id_dish')->on('dish');
            $table->integer('id_step');
            $table->foreign('id_step')->references('id_step')->on('steps');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::table('meassure', function (Blueprint $table) {
            $table->string('type')->after('name');
            $table->dropColumn('unit');
        });
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id_ingredients');
            $table->string('name');
            $table->decimal('quantity');
            $table->timestamp('date_created');
            $table->string('type', 50);
            $table->string('status', 50);
            $table->integer('id_meassure');
            $table->foreign('id_meassure')->references('id_meassure')->on('meassure');
            $table->integer('id_dish');
            $table->foreign('id_dish')->references('id_dish')->on('dish');
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instructions');
        Schema::drop('steps');
        Schema::drop('dish');
        Schema::drop('ingredients');
    }
}
