@extends('layouts.header')

@section('content')

    <div class=”container”>

        @if(\Session::has('error'))

            <div class=”alert alert-danger”>

                {{\Session::get('error')}}

            </div>

        @endif

        <div class=”row”>

            <div class=”col-md-8"></div>

            <div class=”panel panel-default”></div>

                <div class=”panel-heading”>Dashboard</div>

                <?php if(auth()->user()->isAdmin == 1){?>

                <div class=”panel-body”>

                    <a href=”{{url(‘admin/routes’)}}”>Admin</a>

                </div><?php } else echo ‘<div class=”panel-heading”>Normal User</div>’;?>

            </div>

        </div>

        </div>

    </div>

    <!------------------------->

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
                            @if($plan !== null )
                                <h4 class="title">Su plan es de tipo {{$plan->type}} y termina el {{$plan->end}}</h4>
                            @else
                                <h4>Usted no cuenta con un plan</h4>
                            @endif
                            <a href="{{ url('/mi_cuenta/') }}" class="btn btn-info btn-round">Inicio</a>
                            <a href="{{ url('/mi_cuenta/datos') }}" class="btn btn-info btn-round">Mi cuenta</a>
                            <a href="{{ url('/mi_cuenta/factura') }}" class="btn btn-info btn-round">Mis datos</a>
                            <a href="{{ url('/mi_cuenta/historial') }}" class="btn btn-info btn-round">Historial de pedidos</a>
                        </div>
                    </div>
                </div>
                <div class="projects-2">
                    <div class="container">
                    @if($plan !== null )
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto text-center">
                                <h2 class="title">Proximo envio</h2>
                                <h6 class="description">Fecha: 21/11/2018</h6>
                                <div class="section-space"></div>
                            </div>
                        </div>
                        <div class="row">
                            @if($dish->count() > 0)
                                @foreach ($dish as $di)
                                <div class="col-md-4">
                                    <div class="card card-profile">
                                        <div class="card-header card-header-image">
                                            <a href="#pablo">
                                                <img class="img" src="{{asset('img/platos/asparagus.jpg')}}">
                                            </a>
                                        </div>
                                        <div class="card-body ">
                                            <h4 class="card-title">{{ $di }}</h4>
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
                                @endforeach
                            @else
                                @foreach($pedido as $pedid)
                                    <div class="col-md-4">
                                    <div class="card card-profile">
                                        <form method="POST" action="{{ url('/order/create') }}" >
                                            @csrf
                                            <div class="card-header card-header-image">
                                                <a href="#pablo">
                                                    <img class="img" src="{{asset('img/platos/asparagus.jpg')}}">
                                                </a>
                                            </div>
                                            <div class="card-body ">
                                                <h4 class="card-title">{{$pedid->dish}}</h4>
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

                                            <input id="id_plan"  class="form-control{{ $errors->has('id_plan') ? ' is-invalid' : '' }}" name="id_plan" value="{{$plan->plan}}" hidden>
                                            <input id="id_person"  class="form-control{{ $errors->has('id_person') ? ' is-invalid' : '' }}" name="id_person" value="{{$person}}" hidden>
                                            <input id="id_menu_dish"  class="form-control{{ $errors->has('id_menu_dish') ? ' is-invalid' : '' }}" name="id_menu_dish" value="{{$pedid->id}}" hidden required>


                                            <div class="col-md-6 mr-auto ml-auto">
                                                <button type="submit" class="btn btn-rose btn-round">
                                                    {{ __('Adquirir plato') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto text-center">
                                <h2 class="title">Adquiera un plan para disfrutar de nuestros deliciosos platos</h2>
                                <div class="section-space"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <ul class="nav nav-pills nav-pills-primary">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#personal" data-toggle="tab">Sin bebida</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#commercial" data-toggle="tab">Con bebida</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content tab-space">
                                    <div class="tab-pane active" id="personal">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card card-pricing card-plain bg-dark">
                                                    <div class="card-body ">
                                                        <h6 class="card-category">Individual</h6>
                                                        <h1 class="card-title" id="price">
                                                            <small>$</small>100
                                                            <small>/mes</small>
                                                        </h1>
                                                    </div>
                                                    <div class="card-footer justify-content-center">
                                                        <a href="{{ url('/mi_cuenta/plan/1/'.$user->id) }}" class="btn btn-rose btn-round">
                                                            Empieza ahora
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card card-pricing card-raised bg-primary" >
                                                    <div class="card-body">
                                                        <h6 class="card-category text-info">Pareja</h6>
                                                        <h1 class="card-title">
                                                            <small>$</small>200
                                                            <small>/mes</small>
                                                        </h1>
                                                    </div>
                                                    <div class="card-footer justify-content-center">
                                                        <a href="{{ url('/mi_cuenta/plan/2/'.$user->id) }}" class="btn btn-white btn-round">
                                                            Empieza ahora
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card card-pricing card-plain bg-dark">
                                                    <div class="card-body ">
                                                        <h6 class="card-category">Familiar</h6>
                                                        <h1 class="card-title">
                                                            <small>$</small>300
                                                            <small>/mes</small>
                                                        </h1>
                                                    </div>
                                                    <div class="card-footer justify-content-center">
                                                        <a href="{{ url('/mi_cuenta/plan/3/'.$user->id) }}" class="btn btn-rose btn-round">
                                                            Empieza ahora
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="commercial">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card card-pricing card-plain bg-dark">
                                                    <div class="card-body ">
                                                        <h6 class="card-category">Individual</h6>
                                                        <h1 class="card-title">
                                                            <small>$</small>150
                                                            <small>/mes</small>
                                                        </h1>
                                                    </div>
                                                    <div class="card-footer justify-content-center">
                                                        <a href="{{ url('/mi_cuenta/plan/4/'.$user->id) }}" class="btn btn-rose btn-round">
                                                            Empieza ahora
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card card-pricing card-raised bg-primary" >
                                                    <div class="card-body">
                                                        <h6 class="card-category text-info">Pareja</h6>
                                                        <h1 class="card-title">
                                                            <small>$</small>250
                                                            <small>/mes</small>
                                                        </h1>
                                                    </div>
                                                    <div class="card-footer justify-content-center">
                                                        <a href="{{ url('/mi_cuenta/plan/5/'.$user->id) }}" class="btn btn-white btn-round">
                                                            Empieza ahora
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card card-pricing card-plain bg-dark">
                                                    <div class="card-body ">
                                                        <h6 class="card-category">Familiar</h6>
                                                        <h1 class="card-title">
                                                            <small>$</small>350
                                                            <small>/mes</small>
                                                        </h1>
                                                    </div>
                                                    <div class="card-footer justify-content-center">
                                                        <a href="{{ url('/mi_cuenta/plan/6/'.$user->id) }}" class="btn btn-rose btn-round">
                                                            Empieza ahora
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
