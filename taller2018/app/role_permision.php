<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_permision extends Model
{

    protected $table = 'role_permision';
    protected $primaryKey = 'id_role_permision';

    protected $fillable = [
        'id_role',
        'id_permision',
    ];


    protected $guarded = [
    ];

}
