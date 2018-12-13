<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DetalleFactura extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $detalle_factura = [["descripcion_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>100,"id_person"=>1,"id_bill"=>1],
            ["descripcion_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>50,"id_person"=>1,"id_bill"=>1],
            ["descripcion_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>350,"id_person"=>1,"id_bill"=>1],
            ["descripcion_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>2,"id_bill"=>2],
            ["descripcion_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>2,"id_bill"=>2],
            ["descripcion_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>2,"id_bill"=>2],
            ["descripcion_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>3,"id_bill"=>3],
            ["descripcion_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>3,"id_bill"=>3],
            ["descripcion_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>3,"id_bill"=>3],
            ["descripcion_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>4,"id_bill"=>4],
            ["descripcion_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>4,"id_bill"=>4],
            ["descripcion_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>10,"id_person"=>5,"id_bill"=>5],
            ["descripcion_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>250,"id_person"=>5,"id_bill"=>5],
            ["descripcion_bill"=>"producto 1","date_created"=>Carbon::now(),"monto"=>350,"id_person"=>5,"id_bill"=>5],
            ["descripcion_bill"=>"producto 2","date_created"=>Carbon::now(),"monto"=>50,"id_person"=>6,"id_bill"=>6],
            ["descripcion_bill"=>"producto 3","date_created"=>Carbon::now(),"monto"=>150,"id_person"=>6,"id_bill"=>6]];

        DB::table('detalle_fac')->insert($detalle_factura);
    }
}
