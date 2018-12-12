<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/material-kit.css?v=2.1.0') }}" rel="stylesheet">

    </head>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top ">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="/">
                    Appetito 24 </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="pull-left navbar-nav">
                        <li class="nav-item">
                            <a href="#fabrii" class="nav-link">
                            Nuestro menú
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#fabrii" class="nav-link">
                            Como funciona
                            </a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="button-container nav-item iframe-extern">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="button-container nav-item iframe-extern">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn  btn-rose   btn-round btn-block">
                                        <i class="material-icons">face</i> {{ __('Register') }}
                                    </a>
                                @endif
                            </li>
                    @else
                                <a href="{{ url('/factura',Auth::user()->id)}}" class="btn btn-info btn-round btn-sm">Mis Facturas</a>
                                <a href="{{ url('/mi_cuenta/') }}" class="btn btn-info btn-round btn-sm">Inicio</a>
                                <a href="{{ url('/mi_cuenta/datos') }}" class="btn btn-info btn-round btn-sm">Mi cuenta</a>
                                <a href="{{ url('/mi_cuenta/factura') }}" class="btn btn-info btn-round btn-sm">Mis datos</a>
                                <a href="{{ url('/mi_cuenta/historial') }}" class="btn btn-info btn-round btn-sm">Historial de pedidos</a>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="material-icons">view_carousel</i> {{ Auth::user()->firs_name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
        <main class="py-5">
            @yield('content')
        </main>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/moment.min.js') }}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="{{ asset('js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>
<!-- Plugins for presentation and navigation  -->
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-kit.js?v=2.1.0" type="text/javascript') }}"></script>

</html>
