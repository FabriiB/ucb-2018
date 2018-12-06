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
                            <div class="card-header card-header-info card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title"><i class="fa fa-pencil"></i> Estado del pedido</h4>
                                </div>
                                    <form  action="{{route('update',$order->idOrder)}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                        <div class="card-body ">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">ID PEDIDO:</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="idOrder" readonly="readonly" value="{{$order->idOrder}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">ESTADO DEL PEDIDO:</label>
                                                    <div class="card-body ">
                                                        <div class="form-group">
                                                            <select name="status" form="estadoform" required>
                                                                <option value="proceso">En proceso</option>
                                                                <option value="cancelado">Cancelado</option>
                                                                <option value="enviado">Enviado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">DETALLE:</label>
                                                    <div class="card-body ">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="detalle" value="{{$order->detalle}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <center>
                                                    <button class="btn btn-info" type="submit">
                                                    EDITAR</button>
                                                    {{--<a class="btn btn-danger" type="reset" href="{{ URL::previous() }}">--}}
                                                        {{--CANCELAR--}}
                                                    {{--</a>--}}
                                                </center>
                                        </div>
                                </form>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

