<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 23/10/18
 * Time: 11:44 PM
 */

?>
@extends('layouts.template')
@section('content')
    <section class="wrapper">
        <h3>
            <i class="fa fa-angle-right">
            </i>
            Recipes
        </h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4>
                        <i class="fa fa-angle-right">
                        </i>
                        Listado de pedidos
                        <a class="btn btn-success btn-xs" href="recipe/create">
                            <i class="fa fa-plus">
                                New
                            </i>
                        </a>
                    </h4>
                    @include('Recipe.search')
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            protected $fillable = ['idOrder','orderDate','status','cancelDate','idUser'];
                            <tr>
                                <th>
                                    ID ORDEN
                                </th>
                                <th>
                                    FECHA DE LA ORDEN
                                </th>
                                <th>
                                    ESTADO
                                </th>
                                <th>
                                    FECHA DE CANCELACION
                                </th>
                                <th>
                                    ID USUARIO
                                </th>
                            </tr>
                            </thead>
                            @foreach ($Recipe as $r)
                                <tbody>
                                <tr>
                                    <td>
                                        {{ $r->id_recipe }}
                                    </td>
                                    <td>
                                        {{ $r->description }}
                                    </td>
                                    <td>
                                        {{ $r->ingredients }}
                                    </td>
                                    <td>
                                        {{ $r->id_dish }}
                                    </td>
                                    <td>
                                        {{ $r->id_administrator }}
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{URL::action('RecipeController@edit',$r->id_recipe)}}" type="submit">
                                            <i class="fa fa-pencil">
                                                Editar
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                @include('Recipe.modal')
                                </tbody>
                            @endforeach
                        </table>
                    </section>
                </div>
                {{$Recipe->render()}}
            </div>
        </div>
    </section>
@endsection
