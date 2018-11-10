<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthOrder extends Model
{

    protected $table      = 'order';
    protected $primaryKey = 'idOrder';
    public $timestamps    = true;
    protected $fillable = [

        'status',
        'idOrder',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];


}