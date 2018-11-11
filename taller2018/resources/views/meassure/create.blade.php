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
                                    <h4 class="card-title">Listado de las medidas</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <form method="get" action="/" class="form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">With help</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                                <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <select class="selectpicker" data-size="7" data-style="btn btn-default btn-round" title="Single Select">
                                                    <option disabled selected>Single Option</option>
                                                    <option value="2">Foobar</option>
                                                    <option value="3">Is great</option>
                                                    <option value="4">Is bum</option>
                                                    <option value="5">Is wow</option>
                                                    <option value="6">boom</option>
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
