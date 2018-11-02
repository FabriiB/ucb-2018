<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    //use SoftDeletes;

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

    //protected $dates=['deleted_at'];

}
