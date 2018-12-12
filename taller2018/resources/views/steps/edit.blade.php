<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 6/11/18
 * Time: 08:57 PM
 */
?>
@extends('layouts.header')
@section('content')

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
                        Editar: {{$recipe->id_recipe}}
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
                    {!!Form::model($recipe,['method'=>'PATCH','route'=>['recipe.update', $recipe->id_recipe]])!!}
                    {{Form::token()}}
                    <section class="panel" id="no-more-tables">
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <br>
                                        <label class="col-sm-4 col-sm-4 control-label">
                                            DISH
                                        </label>
                                        <div class="col-sm-12">
                                            <label>
                                                <input class="form-control" name="dish" type="text" value="{{$recipe->id_dish}}" >
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td width="50%">
                                    <div class="form-group">
                                        <br>
                                        <label class="col-sm-4 col-sm-4 control-label">
                                            ADMINISTRATOR:
                                        </label>
                                        <div class="col-sm-12">
                                            <label>
                                                <input class="form-control" name="administrator" type="text" value="{{$recipe->id_administrator}}" >
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <br>
                                        <label class="col-sm-4 col-sm-4 control-label">
                                            INGREDIENTS:
                                        </label>
                                        <div class="col-sm-12">
                                            <textarea rows="5" class="form-control" name="ingredients" type="text">{{$recipe->ingredients}}</textarea>
                                        </div>
                                        </br>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" width="33%">
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
    <!-- /MAIN CONTENT -->
@endsection

