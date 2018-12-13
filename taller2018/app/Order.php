<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table      = 'order';
    protected $primaryKey = 'idOrder';
    protected $fillable = [

        'orderDate',
        'status',
        'detalle',
        'cancelDate',
        'idPlan',
        'transaction_id',
        'transaction_date',
        'transaction_host',
        'transaction_user',
        'id_person',
        'id_menu_dish',
    ];
//---------------------------------ESTO SIRVE PARA LOS FILTROS EN ListadoPedidos

//
//    public function scopeName($query,$nombre,$status){
//        if (trim($nombre!="") || trim($status!="")){
//            $query -> where ("firs_name","ilike","%$nombre%")
//                    ->where ("status","like","%$status%");
//        }
//
//    }
    public function scopeName($query,$nombre,$status,$fechaini,$fechafin)
    {
        if (trim($nombre!="") || trim($status!="")){

            if ($fechaini != null && $fechafin != null) {
                $query->whereBetween("orderDate", array("$fechaini", "$fechafin"))
                    ->where("firs_name", "ilike", "%$nombre%")
                    ->where("status", "like", "%$status%");


            }
            if ($fechaini == null && $fechafin != null) {
                $fechaCero = "1950-01-01";
                $query->whereBetween("orderDate", array("$fechaCero", "$fechafin"))
                    ->where("firs_name", "ilike", "%$nombre%")
                    ->where("status", "like", "%$status%");


            }
            if ($fechaini != null && $fechafin == null) {
                $fechaLimite = "2050-12-31";
                $query->whereBetween("orderDate", array("$fechaini", "$fechaLimite"))
                    ->where("firs_name", "ilike", "%$nombre%")
                    ->where("status", "like", "%$status%");

            }
            $query      -> where ("firs_name","ilike","%$nombre%")
                        ->where ("status","like","%$status%");
        }

    }


}



