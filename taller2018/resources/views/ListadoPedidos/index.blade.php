<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 23/10/18
 * Time: 11:44 PM
 */

?>
@extends('layouts.template')
@section('content')
    <section class="wrapper">
        <h3>
            <i class="fa fa-angle-right"></i>
            Pedidos
        </h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4>
                        <i class="fa fa-angle-right">
                        </i>
                        Listado de pedidos
                    </h4>
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf" id="tablaPedidos">
                            <thead class="cf">
                            <tr>
                                <th>ID ORDEN</th>
                                <th>FECHA DE LA ORDEN</th>
                                <th>ESTADO</th>
                                <th>FECHA DE CANCELACION</th>
                                <th>ID USUARIO</th>
                            </tr>
                            </thead>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
