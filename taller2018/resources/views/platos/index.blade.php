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
                                    <h4 class="card-title">Listado de los Platos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <tr>
                                            <td width="92%">
                                                @include('platos.search')
                                            </td>
                                            <td width="8%" valign="top">
                                                <a class="btn btn-info btn-sm" href="receta_c">
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
                                            <th><b>DESCRIPCION</b></th>
                                            <th><b>TIPO</b></th>
                                            <th><b>ESTADO</b></th>
                                            <th><b>USUARIO</b></th>
                                            <th class="text-right"><b>OPCIONES</b></th>
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
                                                <td>{{$m->id_user}}</td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success" href="{{URL::action('DishIngredientsController@create',$m->id_dish)}}" type="submit">
                                                        <i class="material-icons">playlist_add</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-rose" href="{{URL::action('DishIngredientsController@index',$m->id_dish)}}" type="submit">
                                                        <i class="material-icons">format_list_numbered</i>
                                                    </a>
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
                            {{$meassure->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
