<?php;
/**
 * Created by PhpStorm.
 * User: benji
 * Date: 7/11/18
 * Time: 08:13
 */
?>

@extends('layouts.header')
@section('content')
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
                                                <td width="33%"><table>
                                                                <tr>
                                                                        <td width="33%"><h4 align="right">NIT:</h4>
                                                                                <h4 align="right">Factura nro:</h4>
                                                                                <h4 align="right">Autorizacion:</h4></td>
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
                                                    
                                                    </p>
                                            </td>
                                            <td width="45%">
                                                    <p>NIT/CI:
                                                            {{$datos->id}}
                                                    </p>
                                            </td>

                                    </tr>
                                </table>
                                <p align="left">Señor (a):
                                        {{$datos->firs_name}}
                                        {{$datos->last_name1}}
                                        {{$datos->last_name2}}

                                </p>
                                <hr>
                                <center><table border="2" width="100%">
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
                                                <tbody>
                                                <tr>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                </tr>
                                                </tbody>


                                </table></center>
                                <hr>
                                <p align="left">Son: </p>
                                <p align="left">Codigo de control: </p>
                                <br>

                        </div>
                        <table width="100%">
                                <tr>
                                        <td width="80%">

                                        </td>
                                        <td>
                                                <div class="row">
                                                        <div class="col-md-10 ml-auto" >
                                                                <button class="btn btn-info">Generar PDF</button>
                                                        </div>
                                                </div>
                                        </td>
                                </tr>
                        </table>
                </div>

        </div>

        <hr>
@endsection