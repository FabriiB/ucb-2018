<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish', function (Blueprint $table) {
            $table->increments('idDish');
            $table->timestamp('date');
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('status');
            $table->string('tip');
            $table->decimal('quantity');
            $table->integer('idOrder');
            $table->integer('idAdministrator');
            $table->rememberToken();
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
        Schema::dropIfExists('dish');
    }
}
