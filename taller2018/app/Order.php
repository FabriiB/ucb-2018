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


    public function scopeName($query,$nombre,$status){
        if (trim($nombre!="") || trim($status!="")){
            $query -> where ("firs_name","ilike","%$nombre%")
                    ->where ("status","like","%$status%");
        }

    }
//    public function scopeName($query,$fechaini,$fechafin){
//
//
//        if ($fechaini!=null && $fechafin!=null ){
//            $query ->whereBetween("orderDate",array("$fechaini","$fechafin"));
//
//        }
//        if ($fechaini==null && $fechafin!=null){
//            $fechaini="0000-00-00";
//            $query ->whereBetween("orderDate",array($fechaini,"$fechafin"));
//        }
//        if ($fechaini!=null && $fechafin==null){
//            $fechafin="2018-12-21";
//            $query ->whereBetween("orderDate",array("$fechaini","$fechafin"));
//        }
//
//    }


}



