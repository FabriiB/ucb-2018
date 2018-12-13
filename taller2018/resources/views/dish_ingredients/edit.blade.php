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
                                    <h4 class="card-title"><i class="fa fa-pencil"></i>EDITAR PLATO <b>{{$d->name}}</b></h4>
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
                                {!!Form::model($d,['method'=>'PATCH','route'=>['dish_ingredients.update', $d->id_dish]])!!}
                                {{Form::token()}}
                                <table width="100%">
                                    <tr>
                                        <td colspan="6"><br><hr><center><h4>Datos del plato</h4><hr></center></td>
                                    </tr>
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="30%">
                                            <div class="row">
                                                <div class="col-sm-10"><br>
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" placeholder="NOMBRE" title="NOMBRE" value="{{$d->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width=50%">
                                            <div class="row">
                                                <div class="col-sm-11"><br>
                                                    <div class="form-group">
                                                        <input type="text" name="description" class="form-control" placeholder="DESCRIPCION" title="DESCRIPCION" value="{{$d->description}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%"></td>
                                    </tr>
                                </table>
                                <table width="100%">
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="15%">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <select name="portion" class="form-control" title="PORCION">
                                                            @if($d->portion == 1)
                                                                <option disabled>PORCION</option>
                                                                <option value="1" selected>1</option>
                                                                <option value="2">2</option>
                                                                <option value="4">4</option>
                                                                @else
                                                                    @if($d->portion == 3)
                                                                        <option disabled>PORCION</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2" selected>2</option>
                                                                        <option value="4">4</option>
                                                                    @else
                                                                        @if($d->portion == 4)
                                                                            <option disabled>PORCION</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="4"selected>4</option>
                                                                        @endif
                                                                    @endif
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="30%">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <select class="form-control" name="type" type="text" title="TIPO">
                                                            <option disabled selected> TIPO</option>
                                                            <option value="Vegetariano">Vegetariano</option>
                                                            <option value="Asiatico">Asiatico</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="35%">
                                            <div class="row"><br>
                                                <label class="col-sm-3 col-form-label">&emsp;IMAGEN  : </label>
                                                <div class="col-sm-8">
                                                    <div><br>
                                                        <input type="file" accept="image/*" name="imagen" value="{{$d->images}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%"></td>
                                    </tr>
                                </table><br>
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
