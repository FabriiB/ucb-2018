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
                                    <h4 class="card-title"><i class="fa fa-th-large"></i>Listado de los menus</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <tr>
                                            <td width="92%">
                                                @include('menu.search')
                                            </td>
                                            <td width="8%" valign="top">
                                                <a class="btn btn-info btn-sm" href="/menu/create" title="Agregar Menú">
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
                                            <th><b>FECHA DE INICIO</b></th>
                                            <th><b>FECHA DE FIN</b></th>
                                            <th><b>CREADO POR </b></th>
                                            <th><b>STATUS</b></th>
                                            <th class="text-right" width="16%"><b>OPCIONES</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($menu as $m)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_menu}}</td>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->date_created}}</td>
                                                <td>{{$m->date_end}}</td>
                                                <td>{{$m->fn}} {{$m->ln}}</td>
                                                @if($m->status == 'activo')
                                                    <td><span class="badge badge-success">{{$m->status}}</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">{{$m->status}}</span></td>
                                                @endif
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success" href="{{URL::action('MenuDishController@create',$m->id_menu)}}" type="submit" title="Agregar plato a Menú">
                                                        <i class="material-icons">playlist_add</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-rose" href="{{URL::action('MenuDishController@index',$m->id_menu)}}" type="submit" title="Listado de platos del Menú">
                                                        <i class="material-icons">format_list_numbered</i>
                                                    </a><!--
                                                    <a rel="tooltip" class="btn btn-warning" href="" type="submit">
                                                        <i class="material-icons">edit</i>
                                                    </a>-->
                                                    @if($m->status == 'activo')
                                                        <a class="btn btn-danger" href="{{URL::action('MenuController@cambiar',$m->id_menu)}}" type="submit" title="Deshabilitar">
                                                            <i class="material-icons">not_interested</i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-primary" href="{{URL::action('MenuController@cambiar',$m->id_menu)}}" type="submit" title="Habilitar">
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
                            {{$menu->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


