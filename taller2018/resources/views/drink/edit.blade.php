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
                                    <h4 class="card-title"><i class="fa fa-pencil"></i>EDITAR MEDIDA {{$drink->id_drink}}</h4>
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
                                {!!Form::model($drink,['method'=>'PATCH','route'=>['drink.update', $drink->id_drink]])!!}
                                {{Form::token()}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" value="{{$drink->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="description" class="form-control" value="{{$drink->description}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">TIPO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="type" type="text">
                                                <option selected>Gaseosa</option>
                                                <option>Tipo de bebida 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">FECHA DE CADUCIDAD : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" name="caducity_date" class="form-control" value="{{$drink->caducity_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">FECHA DE EMPAQUETADO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" name="packaging_date" class="form-control" value="{{$drink->packaging_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">MEDIDA : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="id_meassure" type="text">
                                                @foreach ($meassure as $m)
                                                    @if($drink->id_meassure == $m->id_meassure)
                                                        <option value="{{$m->id_meassure}}" selected>
                                                            {{$m->id_meassure}} .-
                                                            {{$m->name}}
                                                        </option>
                                                    @else
                                                        <option value="{{$m->id_meassure}}">
                                                            {{$m->id_meassure}} .-
                                                            {{$m->name}}
                                                        </option>
                                                    @endif
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
