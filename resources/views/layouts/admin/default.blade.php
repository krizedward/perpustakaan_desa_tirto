<!DOCTYPE html>
<html>
<head>
  @include('layouts.admin._head')
</head>
<body class="hold-transition {{ (Auth::user()->level == 'member') ? 'skin-red' : 'skin-blue' }} sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('layouts.admin.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('layouts.admin.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://hehe.co.id">Community Service Binus@Malang</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@stack('script')
</body>
</html>

