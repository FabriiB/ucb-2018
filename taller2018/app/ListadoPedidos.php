<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListadoPedidos extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'idOrder';
    public $timestamps    = false;
    protected $fillable = [

        'status',
        'detalle',
        'orderDate',
        'cancelDate',
        'id_person',
        'idPlan',
    ];
    protected $guarded = [
    ];
}
