<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 9/11/18
 * Time: 08:15 PM
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
                                <h4 class="card-title">Listado de las bebidas</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <tr>
                                        <td width="92%">
                                            @include('drink.search')
                                        </td>
                                        <td width="8%" valign="top">
                                            <a class="btn btn-info btn-sm" href="drink/create">
                                                <i class="material-icons">add</i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table">
                                    <thead class="text-success">
                                    <tr>
                                        <th class="text-center"><b>ID</b></th>
                                        <th><b>NOMBRE</b></th>
                                        <th><b>DESCRICION</b></th>
                                        <th><b>TIPO</b></th>
                                        <th><b>FECHA DE CADUCIDAD</b></th>
                                        <th><b>MEDIDA</b></th>
                                        <th><b>ESTADO</b></th>
                                        <th class="text-right"><b>OPCIONES</b></th>
                                    </tr>
                                    </thead>
                                    @foreach ($drink as $m)
                                        <tbody>
                                        <tr>
                                            <td class="text-center">{{$m->id_drink}}</td>
                                            <td>{{$m->name}}</td>
                                            <td>{{$m->description}}</td>
                                            <td>{{$m->type}}</td>
                                            <td>{{$m->caducity_date}}</td>
                                            <td>{{$m->mn}}</td>
                                            @if($m->status == 'activo')
                                                <td><span class="badge badge-success">{{$m->status}}</span></td>
                                            @else
                                                <td><span class="badge badge-danger">{{$m->status}}</span></td>
                                            @endif
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success" href="{{URL::action('DrinkController@edit',$m->id_drink)}}" type="submit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                @if($m->status == 'activo')
                                                <a class="btn btn-danger" href="{{URL::action('DrinkController@cambiar',$m->id_drink)}}" type="submit">
                                                    <i class="material-icons">not_interested</i>
                                                </a>
                                                @else
                                                    <a class="btn btn-primary" href="{{URL::action('DrinkController@cambiar',$m->id_drink)}}" type="submit">
                                                        <i class="material-icons">replay</i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        {{$drink->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
