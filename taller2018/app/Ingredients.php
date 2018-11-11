<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $table      = 'ingredients';
    protected $primaryKey = 'id_ingredients';
    public $timestamps    = false;
    protected $fillable = [

        'name',
        'quantity',
        'date_created',
        'type',
        'status',
        'id_meassure',
        'id_dish',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
