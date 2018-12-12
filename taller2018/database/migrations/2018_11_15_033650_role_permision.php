<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolePermision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permision', function (Blueprint $table) {
            $table->increments('id_role_permision');
            $table->integer('id_permision')->unsigned();
            $table->integer('id_role')->unsigned();

        });
        Schema::table('role_permision', function (Blueprint $table) {
            $table->foreign('id_permision')->references('id_permision')->on('permision')->onDelete('cascade');
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
