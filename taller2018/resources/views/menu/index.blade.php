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
                                    <h4 class="card-title">Listado de las menu</h4>
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
                                                <a class="btn btn-info btn-sm" href="/menu/create">
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
                                            <th><b>FECHA DE INICIO</b></th>
                                            <th><b>FECHA DE FIN</b></th>
                                            <th><b>CREADO POR </b></th>
                                            <th><b>STATUS</b></th>
                                            <th class="text-right"><b>OPCIONES</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($menu as $m)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_menu}}</td>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->date_created}}</td>
                                                <td>{{$m->date_end}}</td>
                                                <td>{{$m->id_user}}</td>
                                                <td>{{$m->status}}</td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success" href="{{URL::action('MenuDishController@create',$m->id_menu)}}" type="submit">
                                                        <i class="material-icons">playlist_add</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-rose" href="{{URL::action('MenuDishController@index',$m->id_menu)}}" type="submit">
                                                        <i class="material-icons">format_list_numbered</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-warning" href="" type="submit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-danger" href="" type="submit">
                                                        <i class="material-icons">close</i>
                                                    </a>
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


