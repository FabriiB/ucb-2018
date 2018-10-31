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
    <section class="wrapper">
        <h3>
            <i class="fa fa-angle-right">
            </i>
            Recipes
        </h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4>
                        <i class="fa fa-angle-right">
                        </i>
                        Create new Recipe
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
                    {!!Form::open(array('url'=>'/recipe','method'=>'POST','autocomplete'=>'off'))!!}
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
                                            <select class="form-control" name="dish" type="text">
                                                @foreach ($id_dish as $d)
                                                    <option value="{{$d->idDish}}">
                                                        {{$d->idDish}} .-
                                                        {{$d->name}}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            <select class="form-control" name="administrator" type="text">
                                                @foreach ($id_ad as $a)
                                                    <option value="{{$a->id_administrator}}">
                                                        {{$a->id_administrator}} .-
                                                        {{$a->name}}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            <textarea rows="5" class="form-control" name="ingredients" type="text"></textarea>
                                        </div>
                                        </br>
                                    </div>
                                </td>
                                <td  width="50%">
                                    <div class="form-group">
                                        <br>
                                        <label class="col-sm-4 col-sm-4 control-label">
                                            DESCRIPTION
                                        </label>
                                        <div class="col-sm-12">
                                            <textarea rows="5" class="form-control" name="description" type="text"></textarea>
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
@endsection
