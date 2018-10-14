<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Conversion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversion', function (Blueprint $table) {
            $table->increments('id_conversion')->unique();
            $table->integer('id_product');
            $table->integer('id_meassure1');
            $table->integer('id_meassure2');
            $table->decimal('factor',10,6);
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
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
        Schema::dropIfExists('conversion');
    }
}
