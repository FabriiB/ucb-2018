<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table      = 'order';
    protected $primaryKey = 'idOrder';
    protected $fillable = [

        'orderDate',
        'id_person',
        'id_menu_dish',
        'idPlan',
        'status'

    ];

    protected $guarded = [
    ];

}



