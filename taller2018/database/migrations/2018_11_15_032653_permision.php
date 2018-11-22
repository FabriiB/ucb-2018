<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permision', function (Blueprint $table) {
            $table->increments('id_permision');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->integer('transaction_id')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_host',50)->nullable();
            $table->string('transaction_user',50)->nullable();
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
