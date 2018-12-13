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
                                    <h4 class="card-title"><i class="fa fa-plus"></i>ELEGIR PLATO PARA EL MENU</h4>
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
                                {!!Form::open(array('url'=>'/menu_dish','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">MENU : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="menu_name" class="form-control" value="{{$menu->name}}" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESDE LA FECHA : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="date_created" class="form-control" value="{{$menu->date_created}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">HASTA LA FECHA  : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="date_end" class="form-control" value="{{$menu->date_end}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">PLATO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="id_dish" type="text">
                                                @foreach ($dish as $m)
                                                    <option value="{{$m->id_dish}}">
                                                        {{$m->id_dish}} .-
                                                        {{$m->name}}
                                                    </option>
                                                @endforeach
                                            </select>
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
