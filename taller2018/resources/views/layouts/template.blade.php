<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 23/10/18
 * Time: 11:53 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>
            Recipe
        </title>
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/table-responsive.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/zabuto_calendar.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/lineicons/style.css')}}">
        <link href="{{asset('assets/css/style.css" rel="stylesheet')}}">
        <link href="{{asset('assets/css/style-responsive.css" rel="stylesheet')}}">
        <script src="{{asset('assets/js/chart-master/Chart.js')}}"></script>
    </head>
    <body>
        <section >
            <!--header start-->
            <header class="header black-bg">
            </header>
            @yield('content');
            <!-- fin contenido -->
        </section>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        <script src="{{asset('assets/js/jquery-1.8.3.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script class="include" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>
        <script src="{{asset('assets/js/common-scripts.js')}}"></script>
        <script src="{{asset('assets/js/chart-master/Chart.js')}}"></script>
        <script src="{{asset('assets/js/chartjs-conf.js')}}"></script>
        <script type="{{asset('text/javascript" src="assets/js/gritter/js/jquery.gritter.js')}}"></script>
        <script type="{{asset('text/javascript" src="assets/js/gritter-conf.js')}}"></script>
        <script src="{{asset('assets/js/sparkline-chart.js')}}"></script>
        <script src="{{asset('assets/js/zabuto_calendar.js')}}"></script>
    </body>
</html>
