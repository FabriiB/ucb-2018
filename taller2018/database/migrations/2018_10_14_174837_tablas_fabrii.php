<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablasFabrii extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('idUser', 'id_user');
            $table->renameColumn('firsName', 'firs_name');
            $table->renameColumn('lastName1', 'last_name1');
            $table->renameColumn('lastName2', 'last_name2');
            $table->renameColumn('birthDay', 'birth_day');
            $table->integer('idPlan')->nullable()->default('null');
            $table->string('status',100)->default('active')->change();
        });

        Schema::create('person', function (Blueprint $table) {
            $table->increments('id_person');
            $table->string('firs_name', 50);
            $table->string('last_name1',50);
            $table->string('last_name2',50)->nullable();
            $table->string('address1',250);
            $table->string('address2',250)->nullable();
            $table->string('email')->unique();
            $table->integer('mobile');
            $table->integer('phone')->nullable();
            $table->date('birthDay');
        });

        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id_bill');
            $table->string('control_code', 50);
            $table->timestamp('issue_date');
            $table->integer('number_bill');
            $table->integer('total_bill');
            $table->string('description_bill',250);
            $table->string('identifier',50);
            $table->string('email');
            $table->timestamp('limit_issue_date');
            $table->integer('authorization_number');
            $table->integer('idUser');
            $table->integer('idCompany');
        });

        Schema::create('company', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('name', 50);
            $table->string('heading',100);
            $table->string('identifier',50);
            $table->string('country',50);
            $table->string('region',50);
        });

        Schema::create('plan', function (Blueprint $table) {
            $table->increments('id_plan');
            $table->string('type', 50);
            $table->decimal('price',100);
            $table->integer('client_number',50);
            $table->integer('id_drink_plan');
        });

        Schema::create('plan_drink', function (Blueprint $table) {
            $table->increments('id_plan_drink');
            $table->string('type', 50);
            $table->decimal('price');
            $table->integer('client_number',50);
            $table->string('description');
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
        Schema::dropIfExists('person');
        Schema::dropIfExists('bill');
        Schema::dropIfExists('company');
        Schema::dropIfExists('plan');
        Schema::dropIfExists('plan_drink');
    }
}
