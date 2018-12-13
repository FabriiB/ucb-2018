@extends('layouts.header')

@section('content')

    <div class="main main-panel">
        <footer class="footer footer-black">
            <div class="container">
                <h3 class="title text-white"> Hola {{$user->firs_name}} {{$user->last_name1}}</h3>
                @if($plan == null )
                    <h4>Usted no cuenta con un plan</h4>
                @else
{{--
                    <h4 class="title">Su plan es de tipo {{$plan->type}} y termina el {{$plan->end}}</h4>
--}}
                @endif
            </div>
        </footer>
        <div class="profile-content">
            <div class="container">
                @if($plan !== null )
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <h3 class="title">El proximo envio sera el {{$order_delivery}} </h3>
                            <div class="section-space"></div>
                        </div>
                    </div>
                    @if($ordenes->count() > 0 )
                    <div class="row">
                    @foreach ($ordenes as $orden)
                            <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-header card-header-image">
                                    <a href="#pablo">
                                        <img class="card-img-top" src="/images/{{$orden->images}}" style="height:200px; ">
                                    </a>
                                </div>
                                <div class="card-body ">
                                    <h4 class="card-title">{{ $orden->name }}</h4>
                                </div>
                                <div class="card-footer ">
                                    <div class="author">
                                        <a href="#">
                                            <span>Detalles</span>
                                        </a>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="button" data-item="{{ $orden->id }}" class="btn-small btn-primary" data-toggle="modal" data-target="#modal{{ $orden->id }}">
                                            Eliminar
                                        </button>
                                        <div class="modal fade" id="modal{{ $orden->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Seguro que desea eliminar este plato de su orden?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        <form method="GET" action="{{ url('/order/destroy/'.$orden->id) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Si</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" data-item="{{ $orden->id }}" class="btn-small btn-primary" data-toggle="modal" data-target="#modal2{{ $orden->id }}">
                                            Editar
                                        </button>

                                        <div class="modal fade" id="modal2{{ $orden->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ url('/order/update')}}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $orden->id }}
                                                            <div class="form-group">
                                                                <select id="country" class="selectpicker" data-style="select-with-transition" title="Plato" name="country" data-size="7">
                                                                    <option disabled>Elija un pais</option>
                                                                    @foreach ($pedido as $pedid)
                                                                        <option value="{{$pedid->id}}">{{$pedid->dish}}</option>
                                                                    @endforeach
                                                                    <input id="id_order"  class="form-control{{ $errors->has('id_order') ? ' is-invalid' : '' }}" name="id_order" value="{{ $orden->id }}" hidden required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary">Si</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    @endif
                    @if($ordenes->count() < $max)
                        <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="title">Nuestra carta semana </h3>
                                </div>
                            @foreach($pedido as $pedid)
                                <div class="col-md-4">
                                    <div class="card card-profile">
                                        <form method="POST" action="{{ url('/order/create') }}" >
                                            @csrf
                                            <div class="card-header card-header-image">
                                                <a href="#pablo">
                                                    <img class="card-img-top" src="/images/{{$pedid->images}}" style="height:200px; ">
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
                                            </div>

                                            <input id="id_plan"  class="form-control{{ $errors->has('id_plan') ? ' is-invalid' : '' }}" name="id_plan" value="{{$plan->plan}}" hidden>
                                            <input id="id_person"  class="form-control{{ $errors->has('id_person') ? ' is-invalid' : '' }}" name="id_person" value="{{$person}}" hidden>
                                            <input id="id_menu_dish"  class="form-control{{ $errors->has('id_menu_dish') ? ' is-invalid' : '' }}" name="id_menu_dish" value="{{$pedid->id}}" hidden>


                                            <div class="col-md-6 mr-auto ml-auto">
                                                <button type="submit" class="btn btn-rose btn-round">
                                                    {{ __('Adquirir plato') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                    @endif
                @else
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <h4 class="title">Adquiera un plan para disfrutar de nuestros deliciosos platos</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="section-space"></div>
                            <div class="container">
                                <ul class="nav nav-pills nav-pills-primary">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#personal" data-toggle="tab">Sin bebida</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#commercial" data-toggle="tab">Con bebida</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-10 ml-auto mr-auto text-center">
                            <div class="tab-content">
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
                                                    <a href="{{ url('/mi_cuenta/plan/3/'.$user->id) }}" class="btn btn-white btn-round">
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
                                                    <a href="{{ url('/mi_cuenta/plan/5/'.$user->id) }}" class="btn btn-rose btn-round">
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
                                                    <a href="{{ url('/mi_cuenta/plan/2/'.$user->id) }}" class="btn btn-rose btn-round">
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
                                                    <a href="{{ url('/mi_cuenta/plan/4/'.$user->id) }}" class="btn btn-white btn-round">
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
@endsection
