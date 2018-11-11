<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $table      = 'instructions';
    protected $primaryKey = 'id_instructions';
    public $timestamps    = false;
    protected $fillable = [

        'time',
        'date_created',
        'type',
        'id_dish',
        'id_step',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
