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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <section class="wrapper">
                                    <h3>
                                        <i class="fa fa-calendar"></i>
                                        Pedidos
                                    </h3>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="content-panel">
                                                <h4>
                                                    <i class="fa fa-folder">
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
                                                        @if($pedidos->count())
                                                        @foreach ($pedidos as $pedido)
                                                            <tbody>
                                                            <tr>
                                                                <td>{{ $pedido->idOrder}}</td>
                                                                <td>{{ $pedido->orderDate }}</td>
                                                                <td>{{ $pedido->status }}</td>
                                                                <td>{{ $pedido->cancelDate }}</td>
                                                                <td>{{ $pedido->idUser }}</td>
                                                                <td>
                                                                    <a class="btn btn-info" href="{{URL::action('ListaPedidosController@edit',$pedido->idOrder)}}" type="submit">
                                                                        <i class="fa fa-pencil">
                                                                            Editar estados
                                                                        </i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="8">No hay registro !!</td>
                                                            </tr>
                                                        @endif
                                                    </table>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    {{ $pedidos->render() }}
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
