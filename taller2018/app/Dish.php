<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table      = 'dish';
    protected $primaryKey = 'idDish';
    public $timestamps    = false;
    protected $fillable = [

        'date',
        'name',
        'description',
        'type',
        'status',
        'tip',
        'quantity',
        'idOrder',
        'idAdministrator',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
