<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    protected $table      = 'steps';
    protected $primaryKey = 'id_step';
    public $timestamps    = false;
    protected $fillable = [

        'title',
        'description',
        'date_created',
        'images',
        'status',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',

    ];
    protected $guarded = [
    ];
}
