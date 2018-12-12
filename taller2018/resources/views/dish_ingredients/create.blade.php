<?php
/**
* Created by PhpStorm.
* User: cristal
* Date: 6/11/18
* Time: 08:57 PM
*/
?>
@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">ELEGIR INGREDIENTE PARA EL PLATO</h4>
                                </div>
                            </div>
                            @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{$error}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body ">
                                {!!Form::open(array('url'=>'/dish_ingredients','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">PLATO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="dish_name" class="form-control" value="{{$menu->name}}" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="description" class="form-control" value="{{$menu->description}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">PORCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="portion" class="form-control" value="{{$menu->portion}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">TIPO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="type" class="form-control" value="{{$menu->type}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">INGREDIENTES : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="id_ingredient" type="text">
                                                @foreach ($dish as $m)
                                                    <option value="{{$m->id_ingredients}}">
                                                        {{$m->id_ingredients}} .-
                                                        {{$m->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">CANTIDAD : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input class="form-control" name="quantity" type="number" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <div class="col-sm-12">
                                            <button class="btn btn-info" type="submit">
                                                Guardar
                                            </button>
                                            <a class="btn btn-danger" href="{{ URL::previous() }}" type="reset">
                                                Cancelar
                                            </a>
                                        </div>
                                    </center>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
