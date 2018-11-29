<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'id';
    public $timestamps    = false;
    protected $fillable = [
        'name',
        'level_id',
        'boss_id',
        'catalogue_id',
    ];
}
