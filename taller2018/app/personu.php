<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personu extends Model
{
    protected $table      = 'person';
    protected $primaryKey = 'id_person';
    protected $fillable = [

        'firs_name',
        'id_person'

    ];


    protected $guarded = [
    ];
}
