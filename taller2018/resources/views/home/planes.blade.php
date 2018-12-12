@extends('layouts.header')

@section('content')
    <div class="section main main-panel">
        {{--<div class="col-md-10 ml-auto mr-auto">
            <div class="card card-profile">
                <div class="card-body ">
                  <h4 class="card-title">{{$user->firs_name}} {{$user->last_name1}}</h4>
                    <a href="{{ url('/mi_cuenta/') }}" class="btn btn-info btn-round">Inicio</a>
                    <a href="{{ url('/mi_cuenta/datos') }}" class="btn btn-info btn-round">Mi cuenta</a>
                    <a href="{{ url('/mi_cuenta/factura') }}" class="btn btn-info btn-round">Mis datos</a>
                    <a href="{{ url('/mi_cuenta/historial') }}" class="btn btn-info btn-round">Historial de pedidos</a>
                </div>
            </div>
        </div>--}}
        <form method="POST" action="{{ url('/person/create') }}" >
            @csrf
                <div class="row">
                    <div class="col-md-3 ml-auto">
                        <h3 class="title"> Plan {{$plan->type}} </h3>
                        @if( $plan->drink_plan === true)
                            <h4 class="description">con bebida</h4>
                        @else
                            <h4 class="description">sin bebida</h4>
                        @endif
                        <h3 class="main-price">${{$plan->price}}</h3>
                        <a class="title">Descripcion</a>
                        <p>Los planes cuentan con 30 platos. Los ingredientes seran calculados de acuerdo a su plan y podra elegir sus platos de nuestro menu semanal y si esta en el plan de bebida constara con 4 bebidas.</p>
                        <a class="title">Dias de entrega</a>
                        <p>Las comidas se entregan los dias Lunes y Miercoles durante la mañana para que pueda cocinarlos con toda comodidad, las entregas se hacen en toda la ciudad de La Paz.</p>
                        <a class="title">Dia limite de pedido</a>
                        <p>Puedes realizar tu pedido hasta el sabado a las 23:59h. y lo recibirás lunes. Si realizas tu pedido a partir del lunes, nuestro prepara a lo largo del siguiente pedido.</p>
                    </div>
                    <div class="col-md-4 ml-2 mr-auto">
                        @if($person !== null)
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h3 class="title"> Datos para la factura </h3>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="firs_name" class="bmd-label-floating">Nombre</label>
                                        <input id="firs_name" type="text" class="form-control{{ $errors->has('firs_name') ? ' is-invalid' : '' }}" name="firs_name" value="{{ old('firs_name') }}" required>
                                        @if ($errors->has('firs_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firs_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name1" class="bmd-label-floating">Apellido Paterno</label>
                                        <input id="last_name1" type="text" class="form-control{{ $errors->has('last_name1') ? ' is-invalid' : '' }}" name="last_name1" value="{{ old('last_name1') }}" required>
                                        @if ($errors->has('lastName1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name1') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name2" class="bmd-label-floating">Apellido Materno</label>
                                        <input id="last_name2" type="text" class="form-control{{ $errors->has('last_name2') ? ' is-invalid' : '' }}" name="last_name2" value="{{ old('last_name2') }}" required>
                                        @if ($errors->has('lastName2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name2') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="address1" class="bmd-label-floating">Direccion 1</label>
                                        <input id="address1" type="text" class="form-control{{ $errors->has('address1') ? ' is-invalid' : '' }}" name="address1" value="{{ old('address1') }}" required>
                                        @if ($errors->has('address1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address1') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="address2" class="bmd-label-floating">Direccion 2</label>
                                        <input id="address2" type="text" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" value="{{ old('address2') }}">
                                        @if ($errors->has('address2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="mobile" class="bmd-label-floating">Mobile</label>
                                            <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="phone" class="bmd-label-floating">Phone</label>
                                            <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <select id="country" class="selectpicker" data-style="select-with-transition" title="Pais" name="country" data-size="7">
                                                <option disabled>Elija un pais</option>
                                                @foreach ($paises as $pais)
                                                    <option value="{{$pais->id}}">{{$pais->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <select id="city" class="selectpicker" data-style="select-with-transition" title="Departamento" name="city" data-size="7">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="nit" class="bmd-label-floating">NIT</label>
                                            <input id="nit" type="text" class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}" name="nit" value="{{ old('nit') }}">

                                            @if ($errors->has('nit'))
                                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="birthDay">Birthday</label>
                                            <input id="birthDay" type="date" class="form-control{{ $errors->has('birthDay') ? ' is-invalid' : '' }}" name="birthDay" value="{{ old('birthDay') }}" required>
                                            @if ($errors->has('birthDay'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('birthDay') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <div class="col-lg-6 hidden">
                            <div class="form-group">
                                <input id="id_user"  class="form-control{{ $errors->has('id_user') ? ' is-invalid' : '' }}" name="id_user" value="{{ $user->id }}" hidden required>
                                @if ($errors->has('id_user'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_user') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 hidden">
                            <div class="form-group">
                                <input id="id_plan"  class="form-control{{ $errors->has('id_plan') ? ' is-invalid' : '' }}" name="id_plan" value="{{ $plan->id_plan }}" hidden required>
                                @if ($errors->has('id_plan'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_plan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mr-auto">
                        <div class="title">
                            <h3 class="title">Plataforma de pago</h3>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="platform" id="platform" value="paypal"> Paypal
                                <span class="circle">
                                            <span class="check"></span>
                                        </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="platform" id="platform" value="pagosnet"> PagosNet
                                <span class="circle">
                                            <span class="check"></span>
                                        </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="platform" id="platform" value="transferencia"> Transferencia bancaria
                                <span class="circle">
                                            <span class="check"></span>
                                        </span>
                            </label>
                        </div>
                        <div class="form-group ml-auto mr-auto">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-rose btn-round">
                                    {{ __('Adquirir plan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
    </div>


    <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '/mi_cuenta/depts/'+stateID,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                            if(data){
                                $('#city').empty();
                                $('#city').focus;
                                $('#city').append('<option disabled> Elija departamento</option>')
                                $.each(data, function(key, value){
                                    $('select[name="city"]').append('<option value="'+ key +'">' + value.name+ '</option>');
                                });
                                $('#city').selectpicker('refresh');
                            }else{
                                $('#city').empty();
                            }
                        }
                    });
                }else{
                    $('#city').empty();
                }
            });
        });
    </script>
@endsection
