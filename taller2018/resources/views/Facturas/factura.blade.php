<br>

<div class="main main-raised">
    <div class="section section-basic">
        <div class="container">
            <table width="100%">
                <tr>
                    <td width="33%"><h3 align="left"><b>APPETITO 24</b></h3>
                        <p align="left">Zona ..., Calle ..., #100</p>
                        <p align="left">La Paz - Bolivia</p>
                    </td>
                    <td width="33%"><h1 align="center"><b>Factura</b></h1></td>
                    <td width="33%">
                        <table>
                            <tr>
                                <td width="33%"><h4 align="right">NIT:
                                        {{$nit->identifier}}</h4>
                                    <h4 align="right">Factura nro:
                                        {{$datos->id_bill}}
                                    </h4>
                                    <h4 align="right">Autorizacion:
                                        {{$datos->authorization_number}}

                                    </h4></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <hr>
            <table width="100%">
                <tr>
                    <td width="45%">
                        <p>Fecha:
                            {{$now}}
                        </p>
                    </td>
                    <td width="45%">
                        <p>NIT/CI:
                            {{$datos->nit}}
                        </p>
                    </td>
                </tr>
            </table>
            <p align="left">Señor (a):
                {{$datos->firs_name}}
                {{$datos->last_name1}}
                {{$datos->last_name2}}

            </p>
            <center>
                <table border="2" width="100%">
                    <thead>
                    <tr>
                        <th>
                            Descripcion
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                    </thead>
                    @foreach($detalle as $d)
                        <tbody>
                        <tr>
                            <td>
                                {{$d->description_bill}}
                            </td>
                            <td>
                                {{$d->monto}}
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td>TOTAL</td>
                        <td>{{$datos->total_bill}}</td>

                    </tr>
                    </tfoot>


                </table></center>
            <hr>

            <p align="left">Son:{{$letras}} </p>
            <p align="left">Codigo de control:
            {{$datos->control_code}}
            <!---->
            </p>
            <p align="left">Fecha Limite de Emision:
                @php
                    $fecha = date('d-m-Y');
            $nuevafecha = strtotime('+90 day', strtotime($fecha));
            $nuevafecha = date('d-m-Y', $nuevafecha);
                @endphp
                {{$nuevafecha}}

            </p>
            <br>

        </div>
        <div class="col-md-10 ml-auto" >
        <!-- <a class="btn btn-info" href="{{URL::action('QrController@make')}}" type="submit" title="Generar QR"></a>-->
            <img src="../../qr1.png">
        </div>
        <table width="100%">
            <tr>
                <td width="80%">
                    <h5>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"</h5>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-10 ml-auto" >
                            <h6>Ley Nro 453: "los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad"</h6>
                        </div>

                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>

<hr>