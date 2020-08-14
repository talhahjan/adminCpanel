<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin_plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/admin_plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/admin_plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/admin_plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin_css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin_plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin_plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Google Font: Source Sans Pro  -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('Css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{isset(Auth::user()->profile->avatar) ? asset(Auth::user()->profile->avatar) : asset('assets/admin_img/user2-160x160.jpg')}}" class="img-circle elevation-2" style="height: 30px; width:30px; margin-right: 10px" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->profile->first_name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">{{Auth::user()->profile->first_name}}
                                    {{ Auth::user()->profile->last_name}}</h3>
                                <h5 class="widget-user-desc">{{Auth::user()->role->name}}</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{isset(Auth::user()->profile->avatar) ? asset(Auth::user()->profile->avatar) : asset('assets/admin_img/user2-160x160.jpg')}}" alt="User Avatar">
                            </div>

                            <div class="card-body">
                                asas
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="float-left"><a href="{{route('logout')}}" class="btn btn-info btn-sm" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Signout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </span>


                                        <span class="float-right"><a href="3" class="btn btn-info btn-sm">Profile</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('assets/admin_img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <img src="{{ Auth::user()->profile->avatar ? asset(Auth::user()->profile->avatar) : asset('assets/admin_img/user2-160x160.jpg') }}" class="img-circle elevation-2" style="height: 30px; width:30px; margin-right: 10px" alt="User Image">
                                <p>

                                    {{Auth::user()->profile->first_name}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">



                                <li class="nav-item">
                                    <a href="{{route('admin.profile')}}" class="nav-link">
                                        <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                                        My Profile </a>
                                </li>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.setting')}}" class="nav-link">
                                <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
                                Setting </a>
                        </li>


                        <li class="nav-item">
                            <a  href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="fa fa-power-off nav-icon" aria-hidden="true"></i>
                            Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>                        </li>


                    </ul>

                    </li>










                    <li class="nav-header">Manage Users</li>
                    <li class="nav-item">
                        <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                            <p class="text">View All Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.users.create')}}" class="nav-link">
                        <i class="fa fa-user-plus nav-icon" aria-hidden="true"></i>
                            <p>Add User</p>
                        </a>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 col-12">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumbs')
                        </ol>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            @yield('content')


        </div>


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/admin_plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/admin_plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/admin_plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('assets/admin_plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('assets/admin_plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('assets/admin_plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/admin_plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('assets/admin_plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('assets/admin_plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin_plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/admin_plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/admin_plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/admin_js/adminlte.js')}}"></script>
    @yield('JsScript')
</body>

</html>
