<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 11/11/18
 * Time: 08:00 PM
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
                                                @include('ingredientes.search')
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
                                            <th><b>CANTIDAD</b></th>
                                            <th><b>TIPO</b></th>
                                            <th><b>FECHA DE CREACION</b></th>
                                            <th><b>ESTADO</b></th>
                                            <th><b>MEDIDA</b></th>
                                            <th><b>DISH</b></th>
                                            <th class="text-right"><b>OPCIONES</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($ingredients as $i)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$i->id_ingredients}}</td>
                                                <td>{{$i->name}}</td>
                                                <td>{{$i->quantity}}</td>
                                                <td>{{$i->type}}</td>
                                                <td>{{$i->date_created}}</td>
                                                <td>{{$i->status}}</td>
                                                <td>{{$i->id_meassure}}</td>
                                                <td>{{$i->id_dish}}</td>
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
                            {{$ingredients->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
