@extends('layouts.header')

@section('content')
    <div class="section-space"></div>
<div class="container">
    <div class="row ">
        <div class="col-md-10 mr-auto ml-auto">
            <div class="card card-signup">
                <h2 class="card-title text-center">Registro</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input id="firs_name" type="text" class="form-control{{ $errors->has('firs_name') ? ' is-invalid' : '' }}" name="firs_name" value="{{ old('firs_name') }}" placeholder="Nombre" required autofocus>
                                </div>

                                @if ($errors->has('firs_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firs_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input id="last_name1" type="text" class="form-control{{ $errors->has('last_name1') ? ' is-invalid' : '' }}" name="last_name1" value="{{ old('last_name1') }}"  placeholder="Apellido" required>
                                </div>

                                @if ($errors->has('lastName1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="last_name2" class="col-md-4 col-form-label text-md-right">{{ __('Last Name 2') }}</label>

                            <div class="col-md-6">
                                <input id="last_name2" type="text" class="form-control{{ $errors->has('last_name2') ? ' is-invalid' : '' }}" name="last_name2" value="{{ old('last_name2') }}">

                                @if ($errors->has('last_name2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}

                        {{--<div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('Address 1') }}</label>

                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control{{ $errors->has('address1') ? ' is-invalid' : '' }}" name="address1" value="{{ old('address1') }}" required>

                                @if ($errors->has('address1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>

                            <div class="col-md-6">
                                <input id="address2" type="text" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" value="{{ old('address2') }}">

                                @if ($errors->has('address2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}

                        {{--<div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="material-icons">calendar_today</i>
                                    </span>
                                    <input id="birth_day" type="date" class="form-control{{ $errors->has('birth_day') ? ' is-invalid' : '' }}" name="birth_day" value="{{ old('birth_day') }}" required>
                                    @if ($errors->has('birth_day'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_day') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="material-icons">mail</i>
                                    </span>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo electronico" required>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" >

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme su contraseña" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
