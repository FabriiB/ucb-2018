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
                                            @include('meassure.search')
                                        </td>
                                        <td width="8%" valign="top">
                                            <a class="btn btn-info btn-sm" href="meassure/create">
                                                <i class="material-icons">add</i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table">
                                    <thead class="text-success">
                                    <tr>
                                        <th class="text-center"><b></b>ID</th>
                                        <th><b>NOMBRE</b></th>
                                        <th><b>UNIDAD</b></th>
                                        <th><b>TIPO</b></th>
                                        <th class="text-right"><b>OPCIONES</b></th>
                                    </tr>
                                    </thead>
                                    @foreach ($meassure as $m)
                                        <tbody>
                                        <tr>
                                            <td class="text-center">{{$m->id_meassure}}</td>
                                            <td>{{$m->name}}</td>
                                            <td>{{$m->unit}}</td>
                                            <td>{{$m->type}}</td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success" href="{{URL::action('MeassureController@edit',$m->id_meassure)}}" type="submit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" data-target="#modal-delete-{{$m->id_meassure}}" data-toggle="modal" href="">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('meassure.modal')
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        {{$meassure->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
