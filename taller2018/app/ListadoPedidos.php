<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListadoPedidos extends Model
{
    protected $fillable = ['idOrder','orderDate','status','cancelDate','idUser'];
}
