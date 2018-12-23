<!DOCTYPE html>
<html>
<head>
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

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
<body>

<nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top ">
    <div class="container">
        <div class="navbar-translate">
            <a href="/" class="navbar-brand">
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

<br><br><br>



<div class="container">
    <h2>Permission</h2><br/>
    <div class="">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">

            <table style="width:300%" name="new_user">
                <tr>
                    <th>Permision</th>

                </tr>
                <div class="col-sm-9">

                    <?php
                    $SearchPermision = \App\Http\Controllers\PassController::ShowIdPermision();
                    ?>

                    @foreach ($SearchPermision as $SearchesPermision)
                        <tr>
                            <td>
                                <?php
                                collect($SearchP = DB::select(
                                    DB::raw("select name
                                from permision
                                where id_permision = $SearchesPermision->id_permision;")
                                ))->pluck('name')->toArray();
                                //echo dd($Search);
                                ?>
                                <?php
                                collect($SearchPId = DB::select(
                                    DB::raw("select id_permision
                                from permision
                                where id_permision = $SearchesPermision->id_permision;")
                                ))->pluck('id_permision')->toArray();
                                ?>
                                {{ $SearchP[0]->name }}
                            </td>

                            <td>
                                {!! Form::open(['route' => ['passpermision.permisiondelete', $SearchesPermision->id_permision], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Delete Permission') !!}
                                {!! Form::close() !!}
                            </td>                        </tr>
                    @endforeach
                </div>
            </table>

            <br>
            <br>

            <h2>Role</h2><br/>

            <table style="width:300%" name="table_role">
                <tr>
                    <th>role</th>

                </tr>
                <div class="col-sm-9">

                    <?php
                    $SearchRole = \App\Http\Controllers\PassController::ShowIdRole();
                    ?>

                    @foreach ($SearchRole as $SearchesRole)
                        <tr>
                            <td>
                                <?php
                                collect($SearchR = DB::select(
                                    DB::raw("select name
                                from role
                                where id_role = $SearchesRole->id_role;")
                                ))->pluck('name')->toArray();
                                //echo dd($Search);
                                ?>
                                <?php
                                collect($SearchRId = DB::select(
                                    DB::raw("select id_role
                                from role
                                where id_role = $SearchesRole->id_role;")
                                ))->pluck('id_role')->toArray();
                                ?>
                                {{ $SearchR[0]->name }}
                            </td>

                            <td>
                                {!! Form::open(['route' => ['pass.roledelete', $SearchesRole->id_role], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Delete Role') !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </div>
            </table>

        </div>
    </div>
</div>
</body>
</html>



