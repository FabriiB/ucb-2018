<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table      = 'dish';
    protected $primaryKey = 'id_dish';
    public $timestamps    = false;
    protected $fillable = [

        'name',
        'description',
        'portion',
        'date_created',
        'images',
        'status',
        'type',
        'tip',
        'id_user',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
