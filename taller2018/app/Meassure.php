<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meassure extends Model
{
    protected $table      = 'meassure';
    protected $primaryKey = 'id_meassure';
    public $timestamps    = false;
    protected $fillable = [

        'unit',
        'name',
        'type',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
