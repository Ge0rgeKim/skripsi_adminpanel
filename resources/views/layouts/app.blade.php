<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Home Page')</title>

    @section('headerScripts')
    <!-- Bootstrap -->
    <link href="{{ asset ('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset ('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset ('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset ('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset ('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset ('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset ('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset ('build/css/custom.min.css') }}" rel="stylesheet">

    <style>
        .sv-root-modern .sv-container-modern__title {
            padding-top: 20px;
            margin-left: 15px;
        }

        .sv-page.sv-body__page {
            margin-left: 20px;
        }

        .correct_answer {
            background-color: rgba(26, 179, 148, 0.2);
        }
    </style>

    <!-- jQuery -->
    <script src="{{ asset ('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset ('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('vendors/fastclick/lib/fastclick.js') }}"></script>
    @show

    @yield('footerScripts')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= URL::to('/'); ?>/images/user.png" alt="..." class="img-circle profile_img">
                        </div>
                        @if (Auth::user())
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                        @endif

                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li class="s-nav">
                                    <a href="{{ url('home') }}"><i class="fa fa-home"></i> Dashboard</span></a>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li class="s-nav"><a href="{{ route('mata_pelajaran.index') }}">Mata Pelajaran</a></li>
                            </ul>
                            <ul class="nav side-menu">
                                <li><a>User <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="s-nav"><a href="{{ route('user_murid.index') }}">Murid</a></li>
                                        <li class="s-nav"><a href="{{ route('user_guru.index') }}">Guru</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav side-menu">
                                <li class="s-nav"><a href="{{ route('transaksi_saldo.index') }}">Transaksi Saldo</a></li>
                            </ul>
                            <ul class="nav side-menu">
                                <li class="s-nav"><a href="{{ route('dokumentasi.index') }}">Dokumentasi Sesi</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (Auth::user())
                                    <img src="<?= URL::to('/'); ?>/images/user.png" alt="">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="<?= URL::to('/home/logout') ?>"><i
                                                class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <div class="container">
                @yield('content')
            </div>

            <!-- footer content -->
            <footer>

                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- NProgress -->
    <script src="{{ asset ('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset ('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset ('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset ('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset ('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset ('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset ('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset ('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset ('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset ('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset ('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset ('vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset ('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset ('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset ('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset ('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset ('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset ('build/js/custom.js') }}"></script>
    @yield('script')
</body>

</html>