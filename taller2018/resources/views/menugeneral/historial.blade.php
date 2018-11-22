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
                                            <table width="80%">
                                                <tr><td><br></td></tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <b>DATOS DEL MENU</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td>
                                                        <b>Nombre del menu : {{$menu->name}}</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <b>DATOS DE LOS PLATOS</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>PLATO</td>
                                                    <td>INGREDIENTES</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </table>
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


