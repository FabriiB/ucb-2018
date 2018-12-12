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
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ejemplo: Menu Semana 2">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">DESDE LA FECHA : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="date" value="{{ old('date_created') }}" name="date_created" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">HASTA LA FECHA  : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="date" value="{{ old('date_end') }}" name="date_end" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%">
                                    <tr>
                                        <td colspan="2"><br><hr><center><h4>Elija platos para el menu</h4><hr></center></td>
                                        <td colspan="2"><br><hr><center><h4>Elija bebidas para el menu</h4><hr></center></td>
                                    </tr>
                                    <tr>
                                        <td width="40%"></td>
                                        <td width="10%"><button id="adicional100" name="adicional100" type="button" class="btn btn-primary btn-sm"> + </button></td>
                                        <td width="40%"></td>
                                        <td width="10%"><button id="adicional200" name="adicional200" type="button" class="btn btn-primary btn-sm"> + </button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table width="100%" id="tabla100">
                                                <tr class="fila-fija100">
                                                    <td width="10%"></td>
                                                    <td>
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">PLATO : </label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="id_dish[]" type="text">
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
                                                    </td>
                                                    <td class="eliminar100"><input type="button" class="btn btn-warning btn-sm" value="-"/></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td colspan="2">
                                            <table width="100%" id="tabla200">
                                                <tr class="fila-fija200">
                                                    <td width="10%"></td>
                                                    <td>
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">BEBIDA : </label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="id_drink[]" type="text">
                                                                        @foreach ($drink as $d)
                                                                            <option value="{{$d->id_drink}}">
                                                                                {{$d->id_drink}} .-
                                                                                {{$d->name}}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="eliminar200"><input type="button" class="btn btn-warning btn-sm" value="-"/></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

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
