@extends('layouts.header')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image:url({{asset('img/city-profile.jpg')}});height: 300px"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="{{asset('img/faces/christian.jpg') }}">
                            </a>
                        </div>
                        <div class="card-body ">
                            <h4 class="card-title">{{$user->firs_name}} {{$user->last_name1}}</h4>
                            <a href="{{ url('/mi_cuenta/') }}" class="btn btn-info btn-round">Inicio</a>
                            <a href="{{ url('/mi_cuenta/datos') }}" class="btn btn-info btn-round">Mi cuenta</a>
                            <a href="{{ url('/mi_cuenta/factura') }}" class="btn btn-info btn-round">Mis datos</a>
                            <a href="{{ url('/mi_cuenta/historial') }}" class="btn btn-info btn-round">Historial de pedidos</a>
                        </div>
                    </div>
                </div>
                <div class="projects-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto text-center">
                                <h2 class="title">Proximo envio</h2>
                                <h6 class="description">Fecha: 21/11/2018</h6>
                                <div class="section-space"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('img/platos/asparagus.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h4 class="card-title">Carne con pollo</h4>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="author">
                                            <a href="#pablo">
                                                <span>Detalles</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">schedule</i> 30 min
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('img/platos/food.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h4 class="card-title">Cerdo en salsa soya</h4>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="author">
                                            <a href="#pablo">
                                                <span>Detalles</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">schedule</i> 25 min
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('img/platos/salmon.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h4 class="card-title">Salmon con verduras</h4>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="author">
                                            <a href="#pablo">
                                                <span>Detalles</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">schedule</i> 40 min
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--        <div>  fetches data from the DB, needs work
                                       @foreach($order_table as $OrderTable)
                                           <tbody>
                                           <tr>
                                               <td>
                                                   {{ $table->orderDate }}
                                               </td>
                                               <td>
                                                   {{ $OrderTable->status }}
                                               </td>
                                           </tr>
                                           </tbody>
                                       @endforeach
                                   </div>--}}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
