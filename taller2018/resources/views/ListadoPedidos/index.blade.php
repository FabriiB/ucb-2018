

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
                                    <h4 class="card-title"><i class="fa fa-calendar"></i> Listado de pedidos</h4>
                                </div>
                                <hr>
                                <h4 style="color:#000000">Filtros:</h4>
                                <form action="{{route('ListadoPedidos.index')}}" method="GET">
                                    <a style="color:#000000">Nombre:</a><input type="text" name="firs_name"/>
                                    <a style="color:#000000">Fecha inicial:</a><input name="fechaini" id="fechaini" type="date" min="1990-01-01" max="2050-12-31" />
                                    <a style="color:#000000">Fecha final:</a><input name="fechafin" id="fechafin" type="date" min="1990-01-01" max="2050-12-31" />
                                    <a style="color:#000000">Estado:</a><select name="status" id="status">
                                        <option value=""></option>
                                        <option value="En proceso">En proceso</option>
                                        <option value="Cancelado">Cancelado</option>
                                        <option value="Enviado">Enviado</option>
                                    </select>
                                    <button type="submit" rel="tooltip" class="btn btn-primary btn-sm">
                                        <i class="material-icons">search</i>
                                    </button>
                                </form>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="tablaPedidos">
                                        <thead class="text-success">
                                        <tr>
                                            <th>ID ORDEN</th>
                                            <th>FECHA DE LA ORDEN</th>
                                            <th>ESTADO</th>
                                            <th>NOMBRE DEL USUARIO</th>
                                            <th>MODIFICAR ESTADO</th>
                                        </tr>
                                        </thead>
                                        @if($orders->count())
                                            @foreach ($orders as $order)
                                                <tbody>
                                                <tr>
                                                    <td>{{ $order->idOrder}}</td>
                                                    <td>{{ $order->orderDate }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->firs_name }} {{ $order->last_name1 }} {{ $order->last_name2 }}</td>
                                                    <td>
                                                        <a rel="tooltip" class="btn btn-success" href="{{route('ListadoPedidos.edit',$order->idOrder)}}" type="submit" title="Editar">
                                                            <i class="material-icons">edit
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No existe el elemento</td>
                                            </tr>
                                        @endif
                                    </table>
                                    {{$orders->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
