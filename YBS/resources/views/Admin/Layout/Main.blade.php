<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yangon Bus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="http://ybs.localhost/">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/css/fontawesome.all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="resources/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="resources/css/icheck-bootstrap.min.css">
  <!-- JQVMap 
  <link rel="stylesheet" href="resources/css/jqvmap.min.css">
  -->
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="resources/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="resources/css/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="resources/css/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
@yield('csslink')

@yield('csscode')

    <style>
        body{
            background-color:#1E6CA4;
        }
        .divHeader{
            height:100px;
            background-color:#1E6CA4;
            width:100% !important;
        }
        .mainHeader{
          height:70px;
          position:fixed;
          top:0;
          right:0;
          left:0;
          zIndex:10000;
          background-color:#1E6CA4;
        }
        .mainHeaderSecond{
          height:70px;
        }
        .main-sidebar{
        }
        .ml-custom-left{
            margin-left: auto !important;
            margin-right: 20px !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
 
<nav class="main-header navbar navbar-expand  mainHeaderSecond navbar-light">
    <!-- Left navbar links -->
  
    <!-- Right navbar links -->
    <ul class="navbar-nav">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item " >
        
      </li>
    </ul>
  </nav>
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand mainHeader  navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">@yield('pagename')</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-custom-left">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
        @yield('actionButton')
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://avatars0.githubusercontent.com/u/16041510?s=460&u=509c12fa72908487391932c0592d62d45ce21342&v=4" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Aung Kyaw Nyunt</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bahai text-warning"></i>
              <p>
                Setup
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php/admix/bus" class="nav-link active">
                  <i class="fas fa-bus text-warning nav-icon"></i>
                  <p>Bus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php/admix/busline" class="nav-link">
                  <i class="fas fa-bus-alt text-warning nav-icon"></i>
                  <p>Bus Line</p>
                </a>
              </li>
              
              
            </ul>



          </li>

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-map text-info"></i>
              <p>
                Location
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="index.php/admix/township" class="nav-link">
                  <i class="fas fa-city text-info nav-icon"></i>
                  <p>Township</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php/admix/busstop" class="nav-link">
                  <i class="fas fa-map-signs  text-info nav-icon"></i>
                  <p>Bus Stop</p>
                </a>
              </li>
              
              
            </ul>


            
          </li>
          <li class="nav-item">
            <a href="index.php/admix/buslineroute" class="nav-link">
              <i class="nav-icon fas  text-success fa-bus-alt"></i>
              <p>
                Bus Line Route
                <span class="right badge badge-success">BusStop</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color:white;"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
          <li class="nav-header">Participants</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Administrator
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
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
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            @yield('currentRoute')
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('body')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 Applix.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
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
<script src="resources/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="resources/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="resources/js/bootstrap.bundle.min.js"></script>

<!-- Sparkline -->
<script src="resources/js/sparkline.js"></script>
<!-- JQVMap -->
<!--
<script src="resources/js/jquery.vmap.min.js"></script>
<script src="resources/js/jquery.vmap.usa.js"></script>
-->
<!-- jQuery Knob Chart 
<script src="resources/js/jquery.knob.min.js"></script>
-->
<!-- daterangepicker -->
<script src="resources/js/moment.min.js"></script>
<script src="resources/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="resources/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote 
<script src="resources/js/summernote-bs4.min.js"></script>
-->
<!-- overlayScrollbars -->
<script src="resources/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="resources/js/dashboard.js"></script>
-->
<!-- AdminLTE for demo purposes
<script src="resources/js/demo.js"></script>
 -->
 
@yield('jslink')

@yield('jscode')
    

</body>
</html>
