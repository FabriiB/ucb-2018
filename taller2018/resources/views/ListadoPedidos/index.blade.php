<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 23/10/18
 * Time: 11:44 PM
 */

?>

@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Listado de pedidos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed cf" id="tablaPedidos">
                                        <thead class="cf">
                                        <tr>
                                            <th>ID ORDEN</th>
                                            <th>FECHA DE LA ORDEN</th>
                                            <th>ESTADO</th>
                                            <th>ID USUARIO</th>
                                            <th>MODIFICAR ESTADO</th>
                                        </tr>
                                        </thead>
                                        @if($pedidos->count())
                                            @foreach ($pedidos as $pedido)
                                                <tbody>
                                                <tr>
                                                    <td>{{ $pedido->idOrder}}</td>
                                                    <td>{{ $pedido->orderDate }}</td>
                                                    <td>{{ $pedido->status }}</td>
                                                    <td>{{ $pedido->id_person }}</td>
                                                    <td>
                                                        <a class="btn btn-info" href="{{URL::action('ListaPedidosController@edit',$pedido->idOrder)}}" type="submit">
                                                            <i class="fa fa-pencil">
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
                                </div>
                            </div>
                            {{$pedidos->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
