<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 6/11/18
 * Time: 08:40 PM
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
                                    <h4 class="card-title"><i class="fa fa-list"></i>Listado de los platos del menu  <b>{{$menu->name}}</b></h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <table width="100%">
                                    <tr>
                                        <td colspan="3">
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" value="{{$menu->name}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="3%"></td>
                                        <td>
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">DESDE LA FECHA : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" name="date_created" class="form-control" value="{{$menu->date_created}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">HASTA LA FECHA  : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" name="date_end" class="form-control" value="{{$menu->date_end}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <tr>
                                            <td><br><hr><center><h4>Platos del menu</h4><hr></center></td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <thead class="text-success">
                                        <tr>
                                            <th class="text-center"><b>CÓDIGO</b></th>
                                            <th><b>NOMBRE</b></th>
                                            <th><b>DESCRIPCION</b></th>
                                            <th><b>FECHA DE INICIO</b></th>
                                            <th><b>FECHA FINAL</b></th>
                                            <th><b>TIPO</b></th>
                                            <th><b>ESTADO</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($meassure as $m)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_dish}}</td>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->description}}</td>
                                                <td>{{$m->type}}</td>
                                                <td>{{$m->status}}</td>
                                                <td>{{$m->type}}</td>
                                                <td>{{$m->id_user}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <table width="100%">
                                        <tr>
                                            <td><br><hr><center><h4>Bebidas del menu</h4><hr></center></td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <thead class="text-success">
                                        <tr>
                                            <th class="text-center"><b></b>CÓDIGO</th>
                                            <th><b>NOMBRE</b></th>
                                            <th><b>DESCRIPCION</b></th>
                                            <th><b>TIPO</b></th>
                                            <th><b>ESTADO</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($drink as $d)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_dish}}</td>
                                                <td>{{$d->name}}</td>
                                                <td>{{$d->description}}</td>
                                                <td>{{$d->type}}</td>
                                                <td>{{$d->status}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <center>
                                        <a class="btn btn-danger btn-sm" href="/menu" title="Regresar">
                                            <i class="material-icons">reply</i>
                                        </a>
                                    </center>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


