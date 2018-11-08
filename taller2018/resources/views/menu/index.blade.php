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
                                        <button type="button" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">add</i>
                                        </button>
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
                                        <th>DESCIRPTION</th>
                                        <th>RECIPES</th>
                                        <th>PREPARACION</th>
                                        <th>CREATED BY</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td>2013</td>
                                        <td>2013</td>
                                        <td class="text-right">&euro; 99,225</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


