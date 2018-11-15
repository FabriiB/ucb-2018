<!-- create.blade.php -->
@extends('layouts.template')
@section('content')

<?php
$mytime = Carbon\Carbon::now();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css"/>


</head>

<body>
<div class="container">
    <h2>Create order</h2><br/>
    <form method="post" action="{{url('order')}}" enctype="multipart/form-data">
        @csrf
        <!-- Sending date as hidden value -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="Name"></label>
                <input type="hidden" class="form-control" name="orderDate" value="<?php echo $mytime; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">person:</label>
                <input type="text" class="form-control" name="id_person">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">CI:</label>
                <input type="text" class="form-control" name="id_person">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Email">status:</label>
                <input type="text" class="form-control" name="status">
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
    $('#startdate').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
    $('#enddate').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>

<script type="text/javascript"> //date picker conf
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>
</body>
</html>
