<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMod extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firs_name',
        'email',
        'last_name1',
        'birth_day',
        'status',
        'password',
    ];

        public function roles()
        {
            return $this->belongsToMany('\App\Role');
        }

}
