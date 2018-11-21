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
        return $this->belongsToMany('\App\UserMod');
    }

    protected $guarded = [
    ];

}
