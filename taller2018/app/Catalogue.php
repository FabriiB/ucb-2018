<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table      = 'catalogue';
    protected $primaryKey = 'id';
    public $timestamps    = false;
    protected $fillable = [
        'entity',
    ];
}
