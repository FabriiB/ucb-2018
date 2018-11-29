<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    protected $table      = 'order_delivery';
    protected $primaryKey = 'idOrder_Delivery';
    protected $fillable = [

        'status',
        'shippedDate',
        'idOrder',
        'idDistributor',
    ];
}
