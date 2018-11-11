<!-- index.blade.php -->
<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 23/10/18
 * Time: 11:44 PM
 */

?>
@extends('layouts.template')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
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
            <th>client</th>
            <th>orderDate</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order as $order): ?>
        <tr>
            <td><?=$order['idOrder']?></td>
            <td><?=$order['orderDate']?></td>
            <td><?=$order['status']?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>