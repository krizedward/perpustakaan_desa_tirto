@extends('layouts.admin.default')

<!-- Seleksi Guest -->
  @push('style')

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @endpush

  @push('script')
    <!-- jQuery 3 -->
    <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
  @endpush

  @section('title','Halaman utama')

  @section('content')
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <img src="{{ asset('uploads/info/banner1.jpg')}}" alt="First slide">

                  <div class="carousel-caption">
                    First Slide
                  </div>
                </div>
                <div class="item">
                  <img src="{{ asset('uploads/info/banner2.jpg')}}" alt="Second slide">

                  <div class="carousel-caption">
                    Second Slide
                  </div>
                </div>
                <div class="item">
                  <img src="{{ asset('uploads/info/banner3.jpg')}}" alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  @endsection