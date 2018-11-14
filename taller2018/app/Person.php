<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'id_person';

    protected $fillable = [
        'firs_name',
        'last_name1','last_name2',
        'address1','address2',
        'mobile', 'phone',
        'status', 'nit',
        'city', 'country',
        'birthDay','dishes',
        'id_user',
    ];

}
