<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table = "detalle_fac";
    protected $primaryKey  = "id_detalle";
    public $timestamps = false;
}
