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
                                    <h4 class="card-title">CREAR PLATO</h4>
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
                                {!!Form::open(array('url'=>'/dish','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="description" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">TIPO : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control" name="type" type="text">
                                                <option selected value="Vegetariano">Vegetariano</option>
                                                <option value="Asiatico">Asiatico</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">PORCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select name="porcion" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="4">4</option>
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
