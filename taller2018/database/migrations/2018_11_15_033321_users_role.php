<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_role', function (Blueprint $table) {
            $table->increments('id_users_role');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
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
