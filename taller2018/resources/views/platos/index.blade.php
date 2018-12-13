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
                                    <h4 class="card-title"><i class="fa fa-cutlery"></i>Listado de los Platos</h4>
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
                                                <a class="btn btn-info btn-sm" href="receta_c" title="Agregar Plato">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <thead class="text-success">
                                        <tr>
                                            <th class="text-center"><b>CÓDIGO</b></th>
                                            <th><b>NOMBRE</b></th>
                                            <th><b>DESCRIPCIÓN</b></th>
                                            <th><b>TIPO</b></th>
                                            <th><b>ESTADO</b></th>
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
                                                @if($m->status == 'activo')
                                                    <td><span class="badge badge-success">{{$m->status}}</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">{{$m->status}}</span></td>
                                                @endif
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success" href="{{URL::action('DishIngredientsController@create',$m->id_dish)}}" type="submit" title="Agregar Ingrediente">
                                                        <i class="material-icons">playlist_add</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-rose" href="{{URL::action('DishIngredientsController@index',$m->id_dish)}}" type="submit" title="Listar Ingredientes del Plato">
                                                        <i class="material-icons">format_list_numbered</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-success" href="{{URL::action('PlatosController@edit',$m->id_dish)}}" type="submit" title="Editar">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @if($m->status == 'activo')
                                                        <a class="btn btn-danger" href="{{URL::action('DishIngredientsController@cambiar',$m->id_dish)}}" type="submit" title="Deshabilitar">
                                                            <i class="material-icons">not_interested</i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-primary" href="{{URL::action('DishIngredientsController@cambiar',$m->id_dish)}}" type="submit" title="Habilitar">
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
                            {{$meassure->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
