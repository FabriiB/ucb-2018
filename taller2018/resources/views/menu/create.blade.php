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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Menu Form</h4>
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
                    {!!Form::open(array('url'=>'/menu','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="card-body ">
                        <form method="get" action="/" class="form-horizontal">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">NAME OF MENU : </label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name">
                                        <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">DATE START</label>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control datepicker" name="date_start" value="10/06/2018">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">DATE END</label>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control datepicker" name="date_end" value="10/06/2018">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">CREATED BY</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_administrator" type="text">
                                        @foreach ($id_ad as $a)
                                            <option value="{{$a->id_administrator}}">
                                                {{$a->id_administrator}} .-
                                                {{$a->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <center>
                                <button class="btn btn-success">SUBMIT</button>
                                <a class="btn btn-danger" href="{{url()->previous()}}" type="reset">
                                    CANCEL
                                </a>
                            </center>
                        </form>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

@endsection
