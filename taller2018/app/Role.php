<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'role';
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_role');
    }

    protected $guarded = [
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

//insert into "users_role" (id_users, id_role) values (103, 1);

}
