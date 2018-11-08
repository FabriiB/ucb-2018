<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDish extends Model
{
    protected $table      = 'menu_dish';
    protected $primaryKey = 'id_menu_dish';
    public $timestamps    = false;
    protected $fillable = [

        'date_start',
        'date_end',
        'id_menu',
        'id_dish',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
