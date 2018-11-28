<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 12/11/18
 * Time: 02:16 PM
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
                                    <h4 class="card-title">EDITAR MEDIDA {{$meassure->id_meassure}}</h4>
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
                                {!!Form::model($meassure,['method'=>'PATCH','route'=>['meassure.update', $meassure->id_meassure]])!!}
                                {{Form::token()}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Ejemplo: Gramos, Kilogramo, Litro" value="{{$meassure->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">UNIDAD : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="unit" class="form-control" placeholder="Ejemplo: gr. , kg. , l. " value="{{$meassure->unit}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">TIPO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="type" type="text">
                                                @if($meassure->type == 'Masa')
                                                    <option selected value="Masa">Masa</option>
                                                    <option value="Volumen">Volumen</option>
                                                @else
                                                    <option value="Masa">Masa</option>
                                                    <option selected value="Volumen">Volumen</option>
                                                @endif
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
