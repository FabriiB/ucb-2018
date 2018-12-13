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
    <h2>Add New Role</h2><br/>

    {{Form::open(array('url'=>'/pass','method'=>'AddNewRole'))}}
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">New Role:</label>
                <input type="text" class="form-control" name="new_role" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Permission:</lable>
                <select name="new_permission">
                    <div class="col-sm-9">
                        <?php
                        $Search = \App\Http\Controllers\PassController::ShowPermision();

                        /*$Search = \App\Http\Controllers\PassController::ShowPass();
                        var_dump ($Search);*/
                        ?>
                        @foreach ($Search as $Searchs)
                                <option value="{{ $Searchs->name }}"> {{ $Searchs->name }}</option> <br>
                        @endforeach
                    </div>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <table style="width:100%" name="new_user">
                    <tr>
                        <th>Role</th>
                        <th>Permision</th>
                    </tr>
                    <div class="col-sm-9">

                        <?php
                            $SearchRole = \App\Http\Controllers\PassController::ShowRole();
                            $SearchPermision = \App\Http\Controllers\PassController::ShowPermision();

                            $Cop = false;
                        ?>

                        @foreach ($SearchRole as $SearchesRole)
                            <?php
                                collect($Search = DB::select(
                                DB::raw("select p.name
                                from role r, role_permision rp, permision p
                                where r.id_role = rp.id_role
                                and rp.id_permision=p.id_permision
                                and r.name='$SearchesRole->name';")
                                ))->pluck('name')->toArray();
                                ?>
                        @endforeach
                    </div>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    {{ Form::close() }}
<!-- ------->
    <h2>Assign Role</h2><br/>

    {{Form::open(array('url'=>'/PassAssign','method'=>'AssignRole'))}}
    @csrf
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <lable>Role</lable>
            <select name="assign_role">
                <div class="col-sm-9">
                    <?php
                    $Search = \App\Http\Controllers\PassController::ShowRole();

                    /*$Search = \App\Http\Controllers\PassController::ShowPass();
                    var_dump ($Search);*/
                    ?>
                    @foreach ($Search as $Searchs)
                        <option value="{{ $Searchs->name }}"> {{ $Searchs->name }} </option>
                    @endforeach
                </div>
            </select>

        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <lable>User</lable>
            <select name="assign_user">
                <div class="col-sm-9">
                    <?php
                    $Search = \App\Http\Controllers\PassController::ShowUser();
                    ?>

                    @foreach ($Search as $Searchs)
                        <option>{{ $Searchs->firs_name }}</option>
                    @endforeach
                </div>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    {{ Form::close() }}
</div>
</body>
</html>
