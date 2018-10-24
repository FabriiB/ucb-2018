<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fix2Distributor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distributors', function (Blueprint $table) {
            DB::statement('ALTER TABLE distributors ALTER COLUMN id TYPE integer USING id::integer');
            $table->string('medium',50)->nullable()->change();
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
        DB::statement('ALTER TABLE distributors ALTER COLUMN id TYPE integer USING id::integer');
    }
}
