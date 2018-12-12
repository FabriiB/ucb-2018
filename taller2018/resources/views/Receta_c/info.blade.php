<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 27/11/18
 * Time: 03:28 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Registro del Plato</h4>
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
                            {!!Form::open(array('route'=>'insert','method'=>'POST','autocomplete'=>'off', 'id'=>'frmsave' , 'files'=>true))!!}
                            {{Form::token()}}
                            <table width="100%">
                                <tr>
                                    <td colspan="6"><br><hr><center><h4><b>Datos del plato</b></h4><hr></center></td>
                                </tr>
                                <tr>
                                    <td width="10%"></td>
                                    <td width="30%">
                                        <div class="row">
                                            <div class="col-sm-10"><br>
                                                <div class="form-group">
                                                    <input type="text" name="nombre" class="form-control" placeholder="NOMBRE" title="NOMBRE" value="{{old('nombre')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width=50%">
                                        <div class="row">
                                            <div class="col-sm-11"><br>
                                                <div class="form-group">
                                                    <input type="text" name="descripcion" class="form-control" placeholder="DESCRIPCION" title="DESCRIPCION" value="{{old('descripcion')}}">
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
                                                    <select name="porcion" class="form-control" title="PORCION">
                                                        <option disabled selected> PORCION</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="30%">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <select class="form-control" name="tipo" type="text" title="TIPO">
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
                                                    <input type="file" accept="image/*" name="imagen">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="10%"></td>
                                </tr>
                            </table>
                            <table width="100%">
                                <tr>
                                    <td colspan="6"><br><hr><center><h4><b>Ingredientes</b></h4><hr></center></td>
                                </tr>
                                <tr>
                                    <td width="90%"></td>
                                    <td width="10%"><button id="adicional" name="adicional" type="button" class="btn btn-primary btn-sm"> + </button></td>
                                </tr>
                            </table>
                            <table width="100%" id="tabla">
                                <tr class="fila-fija">
                                    <td width="10%"></td>
                                    <td width="60%">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <div class="form-group">
                                                    <select name="ingrediente[]" class="form-control" title="ELEGIR EL INGREDIENTE">
                                                        <option selected>INGREDIENTE</option>
                                                        @foreach($ingrediente as $i)
                                                            <option value="{{$i->id_ingredients}}">{{$i->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="20%" >
                                        <div class="row">
                                            <div class="col-sm-10"><br>
                                                <div class="form-group">
                                                    <input type="number" name="cantidad[]" class="form-control" placeholder="CANTIDAD" title="CANTIDAD">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="eliminar"><input type="button" class="btn btn-warning btn-sm" value="-"/></td>
                                    <td width="10%"></td>
                                </tr>
                            </table>
                            <table width="100%">
                                <tr>
                                    <td colspan="6"><br><hr><center><h4>Pasos de la preparacion</h4><hr></center></td>
                                </tr>
                                <tr>
                                    <td width="90%"></td>
                                    <td width="10%"><button id="adicional1" name="adicional1" type="button" class="btn btn-primary btn-sm"> + </button></td>
                                </tr>
                            </table>
                            <table width="100%" id="tabla1">
                                <tr class="fila-fija1">>
                                    <td width="10%"></td>
                                    <td width="40%">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text" name="titulo_p[]" class="form-control" placeholder="TITULO" title="TITULO">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="40%">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="descripcion_p[]" class="form-control" placeholder="DESCRIPCION" title="CANTIDAD">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="eliminar1"><input type="button" class="btn btn-warning btn-sm" value="-"/></td>
                                    <td width="10%"></td>
                                </tr>
                            </table>
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

@endsection
