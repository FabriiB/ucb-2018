<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'idPayment';
    protected $fillable = [
        'platform',
        'date',
        'status',
        'idPlan',
        'idUser',
    ];
}
