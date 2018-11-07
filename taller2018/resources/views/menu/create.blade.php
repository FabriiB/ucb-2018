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
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Form Elements</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <form method="get" action="/" class="form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">With help</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Placeholder</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="placeholder">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Disabled</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="Disabled input here.." disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Static control</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <p class="form-control-static">hello@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label label-checkbox">Checkboxes and radios</label>
                                        <div class="col-sm-10 checkbox-radios">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> First Checkbox
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Second Checkbox
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" value="option2" checked> First Radio
                                                    <span class="circle">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" value="option1"> Second Radio
                                                    <span class="circle">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label label-checkbox">Inline checkboxes</label>
                                        <div class="col-sm-10 checkbox-radios">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> a
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> b
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> c
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
