<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishDrink extends Model
{
    protected $table      = 'dish_drink';
    protected $primaryKey = 'id_dish_drink';
    public $timestamps    = false;
    protected $fillable = [

        'date_created',
        'status',
        'id_dish',
        'id_drink',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
