<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permision extends Model
{

    protected $table = 'permision';
    protected $primaryKey = 'id_permision';

    protected $fillable = [
        'name',
        'description',
    ];

    public function persons()
    {
        return $this->belongsToMany('\App\Role');
    }

    protected $guarded = [
    ];

}
