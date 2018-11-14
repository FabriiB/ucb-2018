<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 11/11/18
 * Time: 08:20 PM
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
                                    <h4 class="card-title">CREAR INGREDIENTE</h4>
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
                                {!!Form::open(array('url'=>'/platos','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Ejemplo: Zanahorias, Azucar, Apio, entre otros...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="description" class="form-control" placeholder="Ejemplo: Zanahorias, Azucar, Apio, entre otros...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Ejemplo: Zanahorias, Azucar, Apio, entre otros...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">TIPO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="type" type="text">
                                                <option selected value="Especies y hierbas">Especies y hierbas</option>
                                                <option value="Aceites Vinagres">Aceites Vinagres</option>
                                                <option value="Las Salsas">Las Salsas</option>
                                                <option value="Arroces, pastas, legumbres">Arroces, pastas, legumbres</option>
                                                <option value="Conservas y deshidratados">Conservas y deshidratados</option>
                                                <option value="Verduras">Verduras</option>
                                                <option value="Frutas">Frutas</option>
                                                <option value="Sales y azucares">Sales y azucares</option>
                                                <option value="Aperitivos">Aperitivos</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">TIPO DE MEDIDA: </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="id_meassure" type="text">
                                                @foreach ($meassure as $m)
                                                    <option value="{{$m->id_meassure}}">
                                                        {{$m->id_meassure}} .-
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
