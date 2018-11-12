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
                                <h4 class="card-title">Listado de las medidas</h4>
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
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="material-icons">add</i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table">
                                    <thead class="text-success">
                                    <tr>
                                        <th class="text-center"><b></b>ID</th>
                                        <th><b>NOMBRE</b></th>
                                        <th><b>TIPO</b></th>
                                        <th><b>FECHA DE CADUCIDAD</b></th>
                                        <th><b>FECHA DE EMPAQUE</b></th>
                                        <th><b>MEDIDA</b></th>
                                        <th><b>CREADO POR</b></th>
                                        <th><b>ESTADO</b></th>
                                        <th><b>DESCRICION</b></th>
                                        <th><b>FECHA DE CREACION</b></th>
                                        <th class="text-right"><b>OPCIONES</b></th>
                                    </tr>
                                    </thead>
                                    @foreach ($drink as $m)
                                        <tbody>
                                        <tr>
                                            <td class="text-center">{{$m->id_drink}}</td>
                                            <td>{{$m->name}}</td>
                                            <td>{{$m->type}}</td>
                                            <td>{{$m->caducity_date}}</td>
                                            <td>{{$m->packaging_date}}</td>
                                            <td>{{$m->id_meassure}}</td>
                                            <td>{{$m->id_user}}</td>
                                            <td>{{$m->status}}</td>
                                            <td>{{$m->description}}</td>
                                            <td>{{$m->date_created}}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">close</i>
                                                </button>
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
