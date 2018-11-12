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
                                    <h4 class="card-title">CREAR BEBIDA</h4>
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
                                <form method="get" action="/" class="form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">NOMBRE : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">TIPO : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">FECHA DE CADUCIDAD : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">FECHA DE EMPAQUETADO : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">MEDIDA : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">USUARIO : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">ESTADO : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">DESCRIPCION : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">TIPO : </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <select class="form-control" name="dish" type="text">
                                                    <option selected>asdfsa</option>
                                                    <option>asdfsa</option>
                                                    <option>asdfsa</option>
                                                    <option>asdfsa</option>
                                                    <option>asdfsa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
