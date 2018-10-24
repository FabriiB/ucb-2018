<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fix2Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            if (Schema::hasColumn('cancelDate', '`cancel_date`'))
            {
                DB::select(DB::raw('alter table cancelDate change `cancel_date` `order cancel date` longtext character set utf8 collate utf8_general_ci default null'));
            }
            $table->string('status',100)->change();
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

    }
}
