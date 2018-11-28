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
                                    <h4 class="card-title">CREAR PASOS DE PREPARACION</h4>
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
                                {!!Form::open(array('url'=>'/steps','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                <table>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">TITULO : </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="text" name="title" class="form-control" placeholder="Ejemplo: Paso 2">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="description" class="form-control"/>
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
                                <form method="post">
                                    <h3 class="bg-primary text-center pad-basic no-btm">Agregar Nuevo Alumno </h3>
                                    <table class="table bg-info"  id="tabla">
                                        <tr class="fila-fija">
                                            <td><input required name="idalumno[]" placeholder="ID Alumno"/></td>
                                            <td><input required name="nombre[]" placeholder="Nombre Alumno"/></td>
                                            <td><input required name="carrera[]" placeholder="Carrera"/></td>
                                            <td><input required name="grupo[]" placeholder="Grupo"/></td>
                                            <td class="eliminar"><input type="button"   value="Menos -"/></td>
                                        </tr>
                                    </table>

                                    <div class="btn-der">
                                        <input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>
                                        <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

                                    </div>
                                </form>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
