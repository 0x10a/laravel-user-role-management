<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>User Role Management System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset("/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("/adminlte/bower_components/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("/adminlte/bower_components/Ionicons/css/ionicons.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/adminlte/dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/adminlte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->{{--
    <link rel="stylesheet" href="{{ asset("/adminlte/dist/css/skins/_all-skins.min.css")}}">--}}
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("/adminlte/plugins/iCheck/flat/blue.css")}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset("/adminlte/bower_components/morris.js/morris.css")}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset("/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">
    <!-- Date Picker -->
  <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset("/adminlte/plugins/iCheck/all.css")}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset("/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("/adminlte/bower_components/select2/dist/css/select2.min.css")}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('styles')

</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    <!-- Main Header -->
    <header class="main-header">

        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>URM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin URM</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset("/images/profile/user.png") }}" class="user-image" alt="user"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ asset("/images/profile/user.png") }}" class="img-circle" alt="user" />
                                <p>
                                    @foreach (Auth::user()->roles as $role)
                                        {{ $role->display_name }}{{ (($loop->index + 1) < count(Auth::user()->roles))?',':'' }}
                                    @endforeach

                                    <small>Member since {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                @if(Auth::user()->can(['edit_profile']))
                                    <div class="pull-left">
                                        <a href="{{ url('profile/'.Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                @endif
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset("/images/profile/user.png") }}" class="img-circle" alt="user" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <!-- Optionally, you can add icons to the links -->

                <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                <li class="treeview {{ (Request::is('users') ? 'active' : '') }}
                                    {{ (Request::is('add_user') ? 'active' : '') }}
                                    {{ (Request::is('edit_user') ? 'active' : '') }}
                                    {{ (Request::is('roles') ? 'active' : '') }}
                                    {{ (Request::is('add_role') ? 'active' : '') }}
                                    {{ (Request::is('edit_role') ? 'active' : '') }}
                                    {{ (Request::is('permissions') ? 'active' : '') }}
                                    {{ (Request::is('add_permission') ? 'active' : '') }}
                                    {{ (Request::is('add_permission_by_module') ? 'active' : '') }}
                                    {{ (Request::is('edit_permission') ? 'active' : '') }}">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>User Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=" {{ (Request::is('users') ? 'active' : '') }}
                                    {{ (Request::is('add_user') ? 'active' : '') }}
                                    {{ (Request::is('edit_user') ? 'active' : '') }}
                                  ">
                            <a href="{{ url('/users') }}"><i class="fa fa-circle-o"></i> Users</a>
                        </li>
                        <li class=" {{ (Request::is('roles') ? 'active' : '') }}
                                    {{ (Request::is('add_role') ? 'active' : '') }}
                                    {{ (Request::is('edit_role') ? 'active' : '') }}
                                  ">
                            <a href="{{ url('/roles') }}"><i class="fa fa-circle-o"></i> Roles</a>
                        </li>
                        <li class=" {{ (Request::is('permissions') ? 'active' : '') }}
                                    {{ (Request::is('add_permission') ? 'active' : '') }}
                                    {{ (Request::is('add_permission_by_module') ? 'active' : '') }}
                                    {{ (Request::is('edit_permission') ? 'active' : '') }}
                                  ">
                            <a href="{{ url('/permissions') }}"><i class="fa fa-circle-o"></i> Permissions</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('log') ? 'active' : '') }}"><a href="{{ url('/log') }}"><i class="fa fa-files-o"></i><span>Log</span></a></li>

                  
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('description')</small>
            </h1>
            @yield('header_quick')
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">@yield('title')</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('quick')

            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            URM on github <a href="https://github.com/0x10a/laravel-user-role-management">User Role Management</a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright © 2018 <a href="https://github.com/0x10a/laravel-user-role-management">User Role Management</a>.</strong> All rights reserved.
    </footer>

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset ("/adminlte/bower_components/jquery/dist/jquery.min.js") }}" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 JS -->
<script src="{{ asset ("/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="{{ asset ("/adminlte/bower_components/raphael/raphael.min.js")}}"></script>
<script src="{{ asset ("/adminlte/bower_components/morris.js/morris.min.js")}}"></script>
<!-- jvectormap -->
<script src="{{ asset ("/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{ asset ("/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset ("/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset ("/adminlte/plugins/iCheck/icheck.min.js")}}"></script>

<script src="{{ asset ("/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset ("/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>

<!-- Select2 -->
<script src="{{ asset ("/adminlte/bower_components/select2/dist/js/select2.full.min.js")}}"></script>

<!-- SlimScroll -->
<script src="{{ asset ("/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
<script src="{{ asset ("/adminlte/bower_components/fastclick/lib/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/adminlte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ("/adminlte/dist/js/demo.js") }}"></script>
<!-- Custom Js -->
<script src="{{ asset ("/js/DataTable_Init.js") }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
<script type="text/javascript">
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

</script>
@yield('js')

</body>
</html>