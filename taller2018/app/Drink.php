<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table      = 'drink';
    protected $primaryKey = 'id_drink';
    public $timestamps    = false;
    protected $fillable = [

        'name',
        'type',
        'caducity_date',
        'packaging_date',
        'id_meassure',
        'id_user',
        'status',
        'description',
        'date_created',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
