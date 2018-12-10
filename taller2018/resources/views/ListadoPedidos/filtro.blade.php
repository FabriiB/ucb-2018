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
                                    <h4 class="card-title"><i class="fa fa-calendar"></i>Selección de filtros</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table">
                                    <h3>Seleccione uno de los siguientes filtros para el listado de pedidos:</h3>
                                    <!--Filtro por fecha-->
                                    <b>Filtro por fecha</b>
                                    <hr>
                                    <table>
                                        <tr>
                                            <td>
                                                <tr>Fecha inicial:<input name="datefin" id="dateini" type="date" min="1990-01-01" max="2050-12-31" required></tr>
                                            </td>
                                            <td>
                                                <tr>Fecha final:<input name="datefin" id="datefin" type="date" min="1990-01-01" max="2050-12-31" required></tr></tr>
                                            </td>
                                            <td>
                                                <tr><button class="btn btn-success" title="Filtrar">FILTRAR POR FECHA</button></tr>
                                            </td>
                                        </tr>

                                    </table>
                                    <!--Filtro por nombre-->
                                    <b>Filtro por nombre</b>
                                    <hr>
                                    <table>

                                        <tr>
                                            <td>
                                                <tr>Fecha inicial:<input name="datefin" id="dateini" type="date" min="1990-01-01" max="2050-12-31" required></tr>
                                            </td>
                                            <td>
                                                <tr>Fecha final:<input name="datefin" id="datefin" type="date" min="1990-01-01" max="2050-12-31" required></tr></tr>
                                            </td>
                                            <td>
                                                <tr><button class="btn btn-success" title="Filtrar">FILTRAR POR NOMBRE</button></tr>
                                            </td>
                                        </tr>

                                    </table>

                                    <!--Filtro por estado-->
                                    <b>Filtro por estado</b>
                                    <hr>
                                    <table>
                                        <td>
                                            <tr>
                                                <select name="status" form="estadoform" required>
                                                    <option value="proceso">En proceso</option>
                                                    <option value="cancelado">Cancelado</option>
                                                    <option value="enviado">Enviado</option>
                                                </select>
                                            </tr>
                                                <tr><button class="btn btn-success" title="Filtrar">FILTRAR POR ESTADO</button></tr>
                                        </td>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
