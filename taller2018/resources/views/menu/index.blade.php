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
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">List of Menus</h4>
                            <table class="table" width="100%">
                                <tr>
                                    <td width="90%"></td>
                                    <td class="td-actions text-right">
                                        <a rel="tooltip" class="btn btn-info" href="menu/create">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            @include('menu.search')
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>NAME</th>
                                        <th>DISHES</th>
                                        <th>DISH STATUS</th>
                                        <th>CREATED BY</th>
                                        <th>CREATED DATE</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    @foreach ($menu as $m)
                                    <tbody>
                                    <tr>
                                        <td>{{$m->id_menu}}</td>
                                        <td>{{$m->name}}</td>
                                        <td>{{$m->dd}}</td>
                                        <td>{{$m->ds}}</td>
                                        <td>{{$m->an}}</td>
                                        <td>{{$m->dc}}</td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success" href="" type="submit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a rel="tooltip" class="btn btn-danger" data-target="" data-toggle="modal" href="">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


