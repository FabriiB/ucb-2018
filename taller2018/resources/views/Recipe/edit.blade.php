<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 24/10/18
 * Time: 12:09 AM
 */
?>
@extends('layouts.template')
@section('content')

    <section id="main-content">
        <section class="wrapper">
            <h3>
                <i class="fa fa-angle-right">
                </i>
                Recipe
            </h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4>
                            <i class="fa fa-angle-right">
                            </i>
                            Editar: {{$recipe->description}}
                        </h4>
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
                        {!!Form::model($recipe,['method'=>'PATCH','route'=>['Recipe.update', $recipe->recipe]])!!}
                        {{Form::token()}}
                        <section class="panel" id="no-more-tables">
                            <table width="100%">
                                <tr>
                                    <td width="33%">
                                        <br>
                                        <h4>
                                            <center>
                                                DATOS
                                            </center>
                                        </h4>
                                        </br>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="33%">
                                        <div class="form-group">
                                            <br>
                                            <label class="col-sm-4 col-sm-4 control-label">
                                                DESCRIPTION
                                            </label>
                                            <div class="col-sm-12">
                                                <input class="form-control" name="description" type="text" value="{{$recipe->description}}">

                                            </div>
                                            </br>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="">
                                        <div class="form-group">
                                            <br>
                                            <label class="col-sm-4 col-sm-4 control-label">
                                                INGREDIENTS:
                                            </label>
                                            <div class="col-sm-12">
                                                <input class="form-control" name="ingredients" type="text" value="{{$recipe->ingredients}}">

                                            </div>
                                            </br>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <div class="form-group">
                                                <br>
                                                <div class="col-sm-12">
                                                    <button class="btn btn-primary" type="submit">
                                                        Guardar
                                                    </button>
                                                    <a class="btn btn-danger" href="{{url()->previous()}}" type="reset">
                                                        Cancelar
                                                    </a>
                                                </div>
                                                </br>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </section>
                        {!!Form::close()!!}
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </section>
        <!--/wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
@endsection
