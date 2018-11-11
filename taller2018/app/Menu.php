<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'id_menu';
    public $timestamps    = false;
    protected $fillable = [

        'date_created',
        'date_update',
        'name',
        'status',
        'id_user',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];

}
