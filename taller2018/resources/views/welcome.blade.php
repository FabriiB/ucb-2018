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
    <nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top ">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand">
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
                    @auth
                        <li class="button-container nav-item iframe-extern">
                            <a href="{{ url('/mi_cuenta') }}" class="nav-link"><!---->
                                Home
                            </a>
                        </li>
                    @else
                        <li class="button-container nav-item iframe-extern">
                            <a href="{{ route('login') }}" class="nav-link">
                                Login
                            </a>
                        </li>
                        <li class="button-container nav-item iframe-extern">
                            <a href="{{ route('register') }}" target="_blank" class="btn  btn-rose   btn-round btn-block">
                                <i class="material-icons">face</i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
                @endif
            </div>
        </div>
    </nav>


    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('images/cover.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Come bien todos los dias.</h1>
                    <h4>Los mejores ingredientes en la comodidad del hogar.</h4>
                    <br>
                    <a href="/" target="_blank" class="btn btn-danger btn-raised btn-lg">
                        PIDE AHORA
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="section-space"></div>
        <div class="features-1">
            <div class="container">


                    @if(\Illuminate\Support\Facades\Session::has('error'))

                        <div class=”alert alert-danger”>

                            {{\Illuminate\Support\Facades\Session::get('error')}}

                        </div>

                    @endif

                    <div class=”row”>

                        <div class=”col-md-8"></div>

                        <div class=”panel panel-default”></div>

                        <?php
                            $id = Auth::id();
                            /*
                            echo ("loged user id is ");
                            echo $id;*/
                        $validateuser = new \App\Http\Middleware\Admin();

                        $Cop = $validateuser::handle();


                        if($Cop == True)
                        {
                        ?>
                        <div class=”panel-body”>
                            <a href="{{ url('/pass') }}" target="_blank" class="btn  btn-rose   btn-round btn-block"”>Add Roles</a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>




                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">En solo tres pasos</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">credit_card</i>
                            </div>
                            <h3 class="info-title">Suscribete al plan mensual</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">laptop</i>
                            </div>
                            <h3 class="info-title">Elige tus comidas para toda la semana</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">home</i>
                            </div>
                            <h3 class="info-title">Recibe los ingredientes en la puerta de tu casa</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="projects-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Novedades de la semana</h2>
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
                                <h4 class="card-title">Carne con verduras</h4>
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
            </div>
        </div>
        <div class="projects-3 section-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Contenido de la caja de Appetito24</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-12 ml-auto">
                        <div class="card card-plain">
                            <div class="card-body ">
                                <a href="#pablo">
                                    <h4 class="card-title">Deliciosas recetas diseñadas por el chef.</h4>
                                </a>
                                <p class="card-description">
                                    Con instrucciones paso a paso para que nunca se pierda.
                                </p>
                            </div>
                        </div>
                        <div class="card card-plain">
                            <div class="card-body ">
                                <a href="#pablo">
                                    <h4 class="card-title">Ingredientes de calidad y de procedencia responsable.</h4>
                                </a>
                                <p class="card-description">
                                    Como productos frescos, mariscos sostenibles y mezclas exclusivas de especias.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <img src="{{asset('img/sections/box.png') }}" alt="Rounded Image" class="rounded img-fluid">
                    </div>
                    <div class="col-lg-3 col-md-12 mr-auto">
                        <div class="card card-plain">
                            <div class="card-body ">
                                <a href="#pablo">
                                    <h4 class="card-title">Cantidades en porciones perfectas.</h4>
                                </a>
                                <p class="card-description">
                                    Así que no se desperdician bocados o trozos.
                                </p>
                            </div>
                        </div>
                        <div class="card card-plain">
                            <div class="card-body ">
                                <a href="#pablo">
                                    <h4 class="card-title">Bolsas y paquetes de hielo reciclables.</h4>
                                </a>
                                <p class="card-description">
                                    Para asegurar que sus ingredientes se mantengan frescos hasta que esté en casa y listo
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <h2 class="title">Elije el mejor plan para ti</h2>
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
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="personal">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-pricing card-plain bg-dark">
                                    <div class="card-body ">
                                        <h6 class="card-category">Individual</h6>
                                        <h1 class="card-title">
                                            <small>$</small>100
                                            <small>/mes</small>
                                        </h1>
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <a href="#pablo" class="btn btn-rose btn-round">
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
                                        <a href="#pablo" class="btn btn-white btn-round">
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
                                        <a href="#pablo" class="btn btn-rose btn-round">
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
                                        <a href="#pablo" class="btn btn-rose btn-round">
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
                                        <a href="#pablo" class="btn btn-white btn-round">
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
                                        <a href="#pablo" class="btn btn-rose btn-round">
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
    <!--  Google Maps Plugin  -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
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
