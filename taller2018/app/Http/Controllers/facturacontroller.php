<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\facturarequest;
use Illuminate\Support\Facades\DB;
use App\Bill;
use Carbon\Carbon;
use NumeroALetras;

//include 'ControlCode.php';

class facturacontroller extends Controller
{
    public function index(Request $request)
    {
        $id=1;
        $name=DB::table('bill')
            ->join('payment', 'bill.id_payment','=','payment.idPayment')
            ->join('person', 'person.id_user','=','payment.idUser')
            ->select('person.firs_name as firs_name','person.last_name1 as last_name1', 'person.last_name2 as last_name2','person.nit as nit',
                'bill.control_code as control_code', 'bill.total_bill as total_bill', 'bill.description_bill as description_bill', 'bill.authorization_number as authorization_number','bill.identifier as identifier','bill.issue_date as issue_date')
            ->where('bill.id_bill','=',$id)
            ->first();

        $nit=DB::table('company')
            ->select('company.identifier as identifier')
            ->where('company.id_company','=',1)
            ->first();


        $now = Carbon::now();
        $numerito = 0;
        $numerito=DB::table('bill')
            ->select('total_bill')
            ->where('id_bill','=',$id)
            ->first()
            ->total_bill;

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
        $letras = NumeroALetras::convertir($numerito,'bolivianos 00/100','centimos' );
        return view('Facturas.index',["datos"=>$name, "now"=>$now, "numerito"=>$letras, "nit"=>$nit]);
    }


    public function create(Request $request){

    }
}
