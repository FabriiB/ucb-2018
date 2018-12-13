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
                                    <h4 class="card-title"><i class="fa fa-clock-o"></i>Listado de los pasos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <tr>
                                            <td width="92%">
                                                @include('steps.search')
                                            </td>
                                            <!--<td width="8%" valign="top">
                                                <a class="btn btn-info btn-sm" href="/steps/create">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            </td>-->
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <thead class="text-success">
                                        <tr>
                                            <th class="text-center"><b>CÓDIGO</b></th>
                                            <th><b>TÍTULO</b></th>
                                            <th><b>DESCRIPCIÓN</b></th>
                                            <th><b>STATUS</b></th>
                                            <th class="text-right"><b>OPCIONES</b></th>
                                        </tr>
                                        </thead>
                                        @foreach ($steps as $m)
                                            <tbody>
                                            <tr>
                                                <td class="text-center">{{$m->id_step}}</td>
                                                <td>{{$m->title}}</td>
                                                <td>{{$m->description}}</td>
                                                @if($m->status == 'activo')
                                                    <td><span class="badge badge-success">{{$m->status}}</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">{{$m->status}}</span></td>
                                                @endif
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-warning" href="{{URL::action('StepsController@edit',$m->id_step)}}" type="submit" title="Editar">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @if($m->status == 'activo')
                                                        <a class="btn btn-danger" href="{{URL::action('StepsController@cambiar',$m->id_step)}}" type="submit" title="Deshabilitar">
                                                            <i class="material-icons">not_interested</i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-primary" href="{{URL::action('StepsController@cambiar',$m->id_step)}}" type="submit">
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
                            {{$steps->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


