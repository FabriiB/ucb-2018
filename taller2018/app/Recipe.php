<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table      = 'recipe';
    protected $primaryKey = 'id_recipe';
    public $timestamps    = false;
    protected $fillable = [

        'description',
        'ingredients',
        'id_dish',
        'id_administrator',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
