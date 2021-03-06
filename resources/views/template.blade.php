<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Application GA & Support</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- DataTables -->
  <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
  <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <style>

  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">TRACKING SERVICE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs" style="text-transform: uppercase;">{{ $name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p style="text-transform: uppercase;">
                    {{ $name }} - {{ $dc }}
                    <small>{{ $mail }}</small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ $name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>


          <!-- menu daftar ga  -->
          @if($role_ == 3)
          <li class="
              @if(request()->is('dashboard') )
                {{ 'active' }}
              @endif
              ">
            <a href="/dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="
              @if(request()->is('barang') )
                {{ 'active' }}
              @endif
              ">
            <a href="/barang?page=2">
              <i class="fa fa-cog"></i> <span>Daftar Barang</span>
            </a>
          </li>
          <!-- end menu ga  -->



          <!-- menu support dan spv -->
          @elseif($role_ == 2 || $role_ == 1 )
          <li class="
              @if(request()->is('dashboard') )
                {{ 'active' }}
              @endif
              ">
            <a href="/dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview 
          @if(request()->is('inputservice') || request()->is('barang'))
           {{ 'active' }}
          @endif ">
            <a href="#">
              <i class="fa fa-cog"></i>
              <span>Pengajuan Service</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="
              @if(request()->is('barang') )
                {{ 'active' }}
              @endif
              ">
                <a href="/barang?page=1"><i class="fa fa-circle-o"></i> Daftar Barang</a>
              </li>
              <li class="
              @if(request()->is('inputservice') )
                {{ 'active' }}
              @endif ">
                <a href="/inputservice"><i class="fa fa-circle-o"></i> Input Permintaan Service</a>
              </li>
            </ul>
          </li>

          <li class="treeview 
          @if(request()->is('master') || request()->is('addsarana') || request()->is('upload') )
           {{ 'active' }}
          @endif ">
            <a href="#">
              <i class="fa fa-cog"></i>
              <span>Master Sarana</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="
              @if(request()->is('addsarana') || request()->is('upload') )
                {{ 'active' }}
              @endif
              ">
                <a href="/addsarana"><i class="fa fa-circle-o"></i> Tambah Sarana</a>
              </li>
              <li class="
              @if(request()->is('master') )
                {{ 'active' }}
              @endif ">
                <a href="/master"><i class="fa fa-circle-o"></i> Data Master</a>
              </li>
            </ul>
          </li>
          <li class="treeview 
          @if(request()->is('addUser')  ||  request()->is('user') )
             {{ 'active' }}
          @endif">
            <a href=" #">
              <i class="fa fa-users"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="
              @if(request()->is('addUser') )
                {{ 'active' }}
              @endif"><a href=" /addUser"><i class="fa fa-circle-o"></i> Tambah User</a></li>
              <li class="
              @if(request()->is('user') )
                {{ 'active' }}
              @endif"><a href="/user"><i class="fa fa-circle-o"></i> Daftar User</a></li>
            </ul>
          </li>

          <li class="
          @if(request()->is('musnah') )
             {{ 'active' }}
          @endif">
            <a href="/musnah?page=1">
              <i class="fa fa-trash"></i> <span>Pemusnahan</span>
            </a>
          </li>
          @endif

        </ul>
        </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section> -->

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2021 <a href="#">Support </a> </strong>DC Jakarta 1
    </footer>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->


  <!-- Bootstrap 3.3.7 -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <script type="text/javascript" src="/dist/js/sweetalert.min.js"></script>
  <script src="/dist/js/main.js"></script>
  <!-- bootstrap datepicker -->
  <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- page script -->
  <script>
    $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })

      $('.select2').select2()
    })
  </script>
</body>

</html>