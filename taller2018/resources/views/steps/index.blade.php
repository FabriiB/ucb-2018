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
                                    <h4 class="card-title">Listado de los pasos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <tr>
                                            <td width="92%">
                                                @include('steps.search')
                                            </td>
                                            <td width="8%" valign="top">
                                                <a class="btn btn-info btn-sm" href="/steps/create">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <thead class="text-success">
                                        <tr>
                                            <th class="text-center"><b></b>ID</th>
                                            <th><b>TITULO</b></th>
                                            <th><b>DESCRIPCION</b></th>
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
                                                <td>{{$m->status}}</td>
                                                <td class="td-actions text-right">
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
                            {{$steps->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


