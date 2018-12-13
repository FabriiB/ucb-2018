<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table      = 'bill';
    protected $primaryKey = 'id_bill';
    public $timestamps    = false;
    protected $fillable = [

        'control_code',
        'issue_date',
        'number_bill',
        'total_bill',
        'description_bill',
        'identifier',
        'email',
        'limit_issue_date',
        'authorization_number',
        'idCompany',
        'id_payment',
    ];
    protected $guarded = [
    ];

}
