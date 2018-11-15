<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 10/11/18
 * Time: 12:05 AM
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
                                    <h4 class="card-title">CREAR MEDIDA</h4>
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
                                {!!Form::open(array('url'=>'/meassure','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Ejemplo: Gramos, Kilogramo, Litro">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UNIDAD : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" name="unit" class="form-control" placeholder="Ejemplo: gr. , kg. , l. ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">TIPO : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <select class="form-control" name="type" type="text">
                                                    <option selected value="Masa">Masa</option>
                                                    <option value="Volumen">Volumen</option>
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
