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
                                    <h4 class="card-title">CREAR MENU</h4>
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
                                {!!Form::open(array('url'=>'/menu','method'=>'POST','autocomplete'=>'on'))!!}
                                {{Form::token()}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ejemplo: Menu Semana 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESDE LA FECHA : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" value="{{ old('date_created') }}" name="date_created" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">HASTA LA FECHA  : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" value="{{ old('date_end') }}" name="date_end" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div style="text-align: center;">
                                        <div class="col-sm-12">
                                            <button class="btn btn-info" type="submit">
                                                Guardar
                                            </button>
                                            <a class="btn btn-danger" href="{{ URL::previous() }}" type="reset">
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
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
