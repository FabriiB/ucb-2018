<?php

namespace App\Http\Controllers;

use App\DetalleFactura;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Requests\facturarequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Bill;
use Carbon\Carbon;
use NumeroALetras;
use LaravelQRCode\Facades\QRCode;

//include 'ControlCode.php';

class facturacontroller extends Controller
{
    public function index(Request $request,$id)
    {
        //$id=3;
        $name=DB::table('bill')
            ->join('detalle_fac','bill.id_bill','=','detalle_fac.id_bill')
            ->join('person', 'person.id_person','=','detalle_fac.id_person')
            ->select('person.firs_name as firs_name','person.last_name1 as last_name1', 'person.last_name2 as last_name2','person.nit as nit',
                'bill.control_code as control_code', 'bill.total_bill as total_bill', 'detalle_fac.description_bill as description_bill', 'detalle_fac.monto as monto','bill.authorization_number as authorization_number',
                'bill.identifier as identifier','bill.issue_date as issue_date','bill.id_bill as id_bill' )
            //->where('bill.id_bill','=','detalle_fac.id_bill')
            ->where('bill.id_bill','=',$id)
            ->first();

        $detalle=DB::table('detalle_fac')
            ->join('bill','detalle_fac.id_bill','=','bill.id_bill')
            ->select( 'detalle_fac.description_bill as description_bill', 'detalle_fac.monto as monto')
            ->where('detalle_fac.id_bill','=',$id)
            ->get();
        $total = DB::select("
                                    select a.id_bill,sum(a.monto) as monto
                                    from detalle_fac a
                                    where a.id_bill = ".$id."
                                    group by a.id_bill
                                   ");
        $nit=DB::table('company')
            ->select('company.identifier as identifier')
            ->where('company.id_company','=',1)
            ->first();


        $now = Carbon::now();

        $total = DB::select("
                                    select sum(a.monto) as monto
                                    from detalle_fac a
                                    where a.id_bill = ".$id."
                                    group by a.id_bill
                                   ");
        $total = $total[0]->monto;
        /*try{
            $filename="factura.txt";
            $handle = fopen($filename, "r");
            if ($handle) {
                $controlCode = new ControlCode();
                $count=0;
                while (($line = fgets($handle)) !== false) {
                    $reg = explode("|", $line);
                    //genera codigo de control
                    $code = $controlCode->generate($reg[0],//Numero de autorizacion
                        $reg[1],//Numero de factura
                        $reg[2],//Número de Identificación Tributaria o Carnet de Identidad
                        str_replace('/','',$reg[3]),//fecha de transaccion de la forma AAAAMMDD
                        $reg[4],//Monto de la transacción
                        $reg[5]//Llave de dosificación
                    );
                    if($code===$reg[10]){
                        $count+=1;
                    }
                }

                echo "<script>alert($filename)</script>";
                echo "<script>alert($count)</script>";
                echo "<script>alert(0)</script>";
                fclose($handle);

            }else{
                throw new Exception("<b>Could not open the file!</b>");
            }
        }catch ( Exception $e ){
            echo "Error (File: ".$e->getFile().", line ".
                $e->getLine()."): ".$e->getMessage();
        }*/

        $bill = Bill::find($id);
        /*$numerito1 = (int)$numerito;*/
        //$numerito = 6;
        //dd($numerito);
        $letras = NumeroALetras::convertir($total,'bolivianos 00/100','centimos' );

        return view('Facturas.index',["datos"=>$name, "now"=>$now, "numerito"=>$letras, "nit"=>$nit, "detalle"=>$detalle,"total"=>$total]);


    }


    public function create($payment){

    }
    public function downloadPDF(Request $request,$id){
        //$id=2;
        $datos=DB::table('bill')
            ->join('detalle_fac','bill.id_bill','=','detalle_fac.id_bill')
            ->join('person', 'person.id_person','=','detalle_fac.id_person')
            ->select('person.firs_name as firs_name','person.last_name1 as last_name1', 'person.last_name2 as last_name2','person.nit as nit',
                'bill.control_code as control_code', 'bill.total_bill as total_bill', 'detalle_fac.description_bill as description_bill', 'detalle_fac.monto as monto','bill.authorization_number as authorization_number',
                'bill.identifier as identifier','bill.issue_date as issue_date','bill.id_bill as id_bill' )
            //->where('bill.id_bill','=','detalle_fac.id_bill')
            ->where('bill.id_bill','=',$id)
            ->first();

        $detalle=DB::table('detalle_fac')
            ->join('bill','detalle_fac.id_bill','=','bill.id_bill')
            ->select( 'detalle_fac.description_bill as description_bill', 'detalle_fac.monto as monto')
            ->where('detalle_fac.id_bill','=',$id)
            ->get();

        $nit=DB::table('company')
            ->select('company.identifier as identifier')
            ->where('company.id_company','=',1)
            ->first();

        $total = DB::select("
                                    select sum(a.monto) as monto
                                    from detalle_fac a
                                    where a.id_bill = ".$id."
                                    group by a.id_bill
                                   ");
        $total = $total[0]->monto;
        $now = Carbon::now();
        $numerito = 0;
        $numerito=DB::table('bill')
            ->select('total_bill')
            ->where('id_bill','=',$id)
            ->first()
            ->total_bill;



        $letras = NumeroALetras::convertir($total,'bolivianos 00/100','centimos' );
        $pdf = PDF::loadView('Facturas.factura', compact(['datos','nit','now','letras','detalle','total']));
        return $pdf->download('factura.pdf');


    }
    public function show($id){
        $facturas = DB::select("
                                        select  d.id_bill,b.firs_name,b.last_name1,b.last_name2,d.issue_date, d.limit_issue_date, sum(c.monto) as monto
                                        from users a, person b, detalle_fac c, bill d
                                        where
                                        a.id = b.id_user and
                                        b.id_person = c.id_person and
                                        d.id_bill = c.id_bill and
                                        a.id = ".$id."
                                        group by d.id_bill,b.firs_name,b.last_name1,b.last_name2,d.issue_date, d.limit_issue_date
                            ");
        return view('Facturas.lista_factura',['facturas'=>$facturas]);
    }
}
