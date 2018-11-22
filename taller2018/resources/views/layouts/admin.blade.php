<?php
/**
 * Created by PhpStorm.
 * User: cristal
 * Date: 7/11/18
 * Time: 10:09 AM
 */
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/assets/admin/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="{{asset('/assets/admin/css/api1.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('/assets/admin/css/material-dashboard.css?v=2.0.2')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('/assets/admin/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top ">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/">
                    Appetito 24 </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                </button>
            </div>
        </div>
    </nav>
    <div class="sidebar" data-color="purple" data-background-color="black">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger |rose"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo"><a href="" class="simple-text logo-mini">a</a><a href="" class="simple-text logo-normal">b</a></div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('/assets/admin/img/faces/avatar.jpg')}}" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Tania Andrew
              </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="/menugeneral">
                        <i class="material-icons">dashboard</i>
                        <p> Menu (reporte) </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/menu">
                        <i class="material-icons">dashboard</i>
                        <p> Gestion de Menu </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/drink">
                        <i class="material-icons">dashboard</i>
                        <p> Gestion de Bebidas </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/dish">
                        <i class="material-icons">dashboard</i>
                        <p> Gestion de Platos </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/ingredients">
                        <i class="material-icons">dashboard</i>
                        <p> Gestion de ingredientes </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/meassure">
                        <i class="material-icons">dashboard</i>
                        <p> Gestion de medidas </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/steps">
                        <i class="material-icons">dashboard</i>
                        <p> Gestion de preparacion </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="pedidos">
                        <i class="fa fa-calendar"></i>
                        <p> Gestion de pedidos </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        @yield('content')
    </div>
</div>
</div>
</div>
</div>

<!--   Core JS Files   -->
<script src="{{asset('/assets/admin/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/admin/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/admin/js/core/bootstrap-material-design.min.js" type="text/javascript')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/moment.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/sweetalert2.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/jquery.validate.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/bootstrap-selectpicker.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/fullcalendar.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/jquery-jvectormap.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/nouislider.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="{{asset('/assets/admin/js/plugins/arrive.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{asset('/assets/admin/js/plugins/chartist.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugins/bootstrap-notify.js')}}"></script>
<script src="{{asset('/assets/admin/js/material-dashboard.min.js?v=2.0.2')}}" type="text/javascript"></script>
<script src="{{asset('/assets/admin/demo/demo.js')}}"></script>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

        md.initVectorMap();

    });
</script>
</body>

</html>

