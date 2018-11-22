<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table      = 'order';
    protected $primaryKey = 'idOrder';
    protected $fillable = [

        'orderDate',
        'status',
        'detalle',
        'cancelDate',
        'idPlan',
        'id_person',
        'id_menu_dish',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',


    ];

    protected $guarded = [
    ];

}



