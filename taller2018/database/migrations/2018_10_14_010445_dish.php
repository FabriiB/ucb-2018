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
            $table->varchar('name');
            $table->varchar('description');
            $table->varchar('type');
            $table->varchar('status');
            $table->varchar('tip');
            $table->decimal('quantity');
            $table->serial2('idOrder');
            $table->serial2('idAdministrator');
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
