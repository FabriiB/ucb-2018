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
                                    <h4 class="card-title"><i class="fa fa-list"></i>Menu</h4>
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
                                            <th class="text-center"><b>ID</b></th>
                                            <th><b>NOMBRE</b></th>
                                            <th><b>STATUS</b></th>
                                            <th class="text-right" width="16%"><b>OPCIONES</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($menu as $m)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_menu}}</td>
                                                <td>{{$m->name}}</td>
                                                <td>{{$m->status}}</td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-rose" href="{{URL::action('MenuGeneralController@historial',$m->id_menu)}}" type="submit">
                                                        <i class="material-icons">format_list_numbered</i>
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


