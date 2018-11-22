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
                                    <h4 class="card-title">Listado de los ingredientes del plato  <b>{{$dish->name}}</b></h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" value="{{$dish->name}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="date_created" class="form-control" value="{{$dish->description}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">PORCION  : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="date_end" class="form-control" value="{{$dish->portion}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-success">
                                        <tr>
                                            <th class="text-center"><b></b>ID</th>
                                            <th><b>NOMBRE</b></th>
                                            <th><b>CANTIDAD</b></th>
                                            <th><b>MEDIDA</b></th>
                                            <th><b>TIPO</b></th>
                                            <th><b>ESTADO</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($ing as $m)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_dish}}</td>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->quantity}}</td>
                                                <td>{{$m->id_meassure}}</td>
                                                <td>{{$m->type}}</td>
                                                <td>{{$m->status}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <center>
                                        <a class="btn btn-danger btn-sm" href="/menu">
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


