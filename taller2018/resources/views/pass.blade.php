<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example  </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div class="container">
    <h2>Passport Appointment System</h2><br/>
    <form method="post" action="{{url('passports')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Role:</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Permission</lable>
                    <div class="col-sm-9">
                        <?php
                        $Search = \App\Http\Controllers\PassController::ShowPermision();

                        /*$Search = \App\Http\Controllers\PassController::ShowPass();
                        var_dump ($Search);*/
                        ?>

                        @foreach ($Search as $Searchs)
                                <input type="checkbox" name="camera_video" value="{{ $Searchs->name }}"> {{ $Searchs->name }} <br>
                        @endforeach
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>User</lable>
                <select name="office">
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
    </form>
</div>
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>
</body>
</html>
