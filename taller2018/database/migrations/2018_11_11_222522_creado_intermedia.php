<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreadoIntermedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_plan')->unsigned();
            $table->integer('id_person')->unsigned();
            $table->date('start_date_plan');
            $table->date('ending_date_plan');
            $table->foreign('id_plan')->references('id_plan')->on('plan');
            $table->foreign('id_person')->references('id_person')->on('person');
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host')->nullable();
            $table->string('transaction_user')->nullable();
            $table->timestamps();
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
