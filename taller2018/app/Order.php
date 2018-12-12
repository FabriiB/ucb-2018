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

//    public function scopeName($query,$nombre,$status,$fechaini,$fechafin){
//        if (trim($nombre!="") || trim($status!="")){
//            $query -> where ("firs_name","ilike","%$nombre%")
//                    ->where ("status","like","%$status%")
//                    ->whereBetween("orderDate",array("$fechaini","$fechafin"));
//
//        }
//
//    }

    public function scopeName($query,$fechaini,$fechafin){


        if ($fechaini!=null && $fechafin!=null ){


                //Caso de dos fechas
                if (trim($fechaini!=null) && trim($fechafin!=null)){
                    $query ->whereBetween("orderDate",array("$fechaini","$fechafin"));
//                    dd($query);

                }else{

                    //Caso fecha inicial vacia
                    if ($fechaini){
                        $query ->whereBetween("orderDate",array("0000-00-00","$fechafin"));
                        dd($query);
                    }else{
                        //Caso fecha final vacia
                        if (trim($fechafin==null)){
                            $query ->whereBetween("orderDate",array("$fechaini","2018-12-07"));
//                            dd($query);
                        }
                    }
                }

        }
    }


}



