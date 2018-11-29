<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('idOrder');
            $table->timestamp('orderDate')->nullable();
            $table->string('status',100)->nullable();
            $table->string('detalle')->nullable();
            $table->timestamp('cancelDate')->nullable();
            $table->integer('idUser')->nullable();
            $table->integer('idPlan')->nullable();
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
        Schema::dropIfExists('order');
    }
}
