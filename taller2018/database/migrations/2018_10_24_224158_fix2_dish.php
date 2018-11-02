<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fix2Dish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dish', function (Blueprint $table) {
            $table->string('tip')->nullable()->change();
            $table->integer('transaction_id');
            $table->timestamp('transaction_date');
            $table->string('transaction_host',50);
            $table->string('transaction_user',50);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish', function (Blueprint $table) {
            $table->string('tip')->change();
        });
    }
}
