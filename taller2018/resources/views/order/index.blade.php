<!-- index.blade.php -->

@extends('layouts.template')
@section('content')
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>



</head>
<body>
<div class="container">
    <h2>Order list</h2><br/>
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>user</th>
            <th>orderDate</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order as $order): ?>
        <tr>
            <td><?=$order['idOrder']?></td>
            <td><?=$order['id_person']?></td>
            <td><?=$order['orderDate']?></td>
            <td><?=$order['status']?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>


</body>
</html>