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
                                    <h4 class="card-title"><i class="fa fa-shopping-cart"></i>Listado de los ingredientes</h4>
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
                                                <a class="btn btn-info btn-sm" href="ingredientes/create">
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
                                            <th><b>TIPO</b></th>
                                            <th><b>FECHA DE CREACION</b></th>
                                            <th><b>ESTADO</b></th>
                                            <th class="text-right"><b>OPCIONES</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($ingredients as $i)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$i->id_ingredients}}</td>
                                                <td>{{$i->name}}</td>
                                                <td>{{$i->type}}</td>
                                                <td>{{$i->date_created}}</td>
                                                @if($i->status == 'activo')
                                                    <td><span class="badge badge-success">{{$i->status}}</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">{{$i->status}}</span></td>
                                                @endif
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success" href="{{URL::action('IngredientsController@edit',$i->id_ingredients)}}" type="submit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @if($i->status == 'activo')
                                                        <a class="btn btn-danger" href="{{URL::action('IngredientsController@cambiar',$i->id_ingredients)}}" type="submit">
                                                            <i class="material-icons">not_interested</i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-primary" href="{{URL::action('IngredientsController@cambiar',$i->id_ingredients)}}" type="submit">
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
                            {{$ingredients->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
