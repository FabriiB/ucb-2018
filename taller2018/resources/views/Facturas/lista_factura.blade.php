
@extends('layouts.header')
@section('content')
    <br>
    <br>
    <br>
    <div class="main main-raised">
        <div class="section section-basic">
            <div class="container">
                <table class="table">
                    <thead>
                        <th>Fecha de Emision </th>
                        <th>Fecha limite de Emision </th>
                        <th>Monto </th>
                    </thead>
                    <tbody>
                            @foreach($facturas as $fac)
                                <tr>
                                    <td>{{$fac->issue_date}}</td>
                                    <td>{{$fac->limit_issue_date}}</td>
                                    <td>{{$fac->monto}}</td>
                                    <td><a href="{{route('factura.index',$fac->id_bill)}}" class="btn btn-outline-success">Ver</a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
@endsection
