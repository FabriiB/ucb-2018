<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 23/10/18
 * Time: 11:44 PM
 */

?>
@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <section class="wrapper">
                                    <h3>
                                        <i class="fa fa-angle-right"></i>
                                        Estado de Pedido
                                    </h3>
                                    <div class="row mt">
                                        <div class="col-lg-12">
                                            <div class="content-panel">
                                                <h4>
                                                    <i class="fa fa-angle-right">
                                                    </i>
                                                    Seleccione la opcion
                                                    <?php
                                                    echo pedido.idOrder;
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
