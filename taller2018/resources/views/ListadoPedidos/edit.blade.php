
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
                                    <form  action="{{route('ListadoPedidos.update',$order->idOrder)}}" method="POST">
                                    {{--{!! Form::open(['method'=>'PATCH','action'=>['ListaPedidosController@update',$order->idOrder]]) !!}--}}
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
                                                            <select name="status" id="status" type="text">
                                                                @if($order->status == 'En proceso')
                                                                    <option value="Proceso" selected>En proceso</option>
                                                                    <option value="Cancelado">Cancelado</option>
                                                                    <option value="Enviado">Enviado</option>
                                                                @else
                                                                    @if($order->status == 'Cancelado')
                                                                        <option value="Proceso">En proceso</option>
                                                                        <option value="Cancelado" selected>Cancelado</option>
                                                                        <option value="Enviado">Enviado</option>
                                                                    @else
                                                                        <option value="Proceso">En proceso</option>
                                                                        <option value="Cancelado">Cancelado</option>
                                                                        <option value="Enviado" selected>Enviado</option>
                                                                    @endif
                                                                @endif
                                                            </select>
                                                            {{--<input type="hidden" class="form-control" name="status"  value="{{$order->status}} " required>--}}
                                                        </div>
                                                    </div>s
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">DETALLE:</label>
                                                    <div class="card-body ">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="detalle" placeholder="Detalle de la orden " value="{{$order->detalle}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <center>
                                                    <button class="btn btn-info" type="submit">
                                                    EDITAR</button>
                                                    <a class="btn btn-danger" type="reset" href="{{ URL::previous() }}">
                                                        CANCELAR
                                                    </a>
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

