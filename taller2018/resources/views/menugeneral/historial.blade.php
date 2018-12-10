<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 22/11/18
 * Time: 01:51 AM
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
                                    <h4 class="card-title">HISTORIAL MENU</h4>
                                </div>
                            </div>
                            <br>
                            <div class="main main-raised">
                                <div class="section section-basic">
                                    <div class="container">
                                        <center>
                                            <br>
                                            <table width="80%" class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col"><center><b>DATOS DEL MENU</b></center></th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>Nombre del menu: {{$menu->name}} </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <table width="100%" class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" colspan="2"><b>PLATOS</b></th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            @foreach($platos as $p)
                                                            <table width="95%">
                                                                <tr class="table-active">
                                                                    <td width="15%">ID : {{$p->id_dish}}</td>
                                                                    <td colspan="2">Nombre : {{$p->dish_name}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"> Ingredientes :
                                                                        <br>
                                                                        @foreach($ingredientes as $i)
                                                                            @if($p->id_dish == $i->idish)
                                                                                &emsp; - {{$i->iname}}<br>
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td rowspan="2" width="35%"> Imagen :<br>
                                                                        <div class="card">
                                                                            <img class="card-img-top" src="/images/{{$p->images}}" alt="">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"> Pasos de preparacion :
                                                                        <br>
                                                                        @foreach($pasos as $ip)
                                                                            @if($p->id_dish == $ip->id_dish)
                                                                                &emsp; - {{$ip->title}} : {{$ip->description}}<br>
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                                <br>
                                                            @endforeach
                                                        </center>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


