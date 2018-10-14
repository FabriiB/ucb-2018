<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id', 'idUser');
            $table->renameColumn('name', 'firsName');
            $table->string('lastName1',100);
            $table->string('lastName2',100)->nullable();
            $table->string('address1',250);
            $table->string('address2',250)->nullable();
            $table->integer('mobile');
            $table->integer('phone')->nullable();
            $table->date('birthDay');
            $table->string('status',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
