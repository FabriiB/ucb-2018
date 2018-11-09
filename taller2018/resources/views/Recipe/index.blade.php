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
                            List of recipes
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
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        DESCRIPTION
                                    </th>
                                    <th>
                                        INGREDIENTS
                                    </th>
                                    <th>
                                        ID DISH
                                    </th>
                                    <th>
                                        ID ADMINISTRATOR
                                    </th>
                                    <th width="200px">
                                        OPCIONES
                                    </th>
                                </tr>
                                </thead>
                                @if($pedidos->count())
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
                                            <a class="btn btn-danger btn-xs" data-target="#modal-delete-{{$r->id_recipe}}" data-toggle="modal" href="">
                                                <i class="fa fa-times">
                                                    Eliminar
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
