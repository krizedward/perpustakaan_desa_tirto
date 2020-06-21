@extends('layouts.admin.default')

@if (!Auth::user())
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
  
@else
<!-- Selain Guest -->
  @push('style')
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @endpush

  @push('script')
    <!-- jQuery 3 -->
    <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
  @endpush

  <!-- Dashboard Adminlte -->
  @if(Auth::user()->level == 'member')
    @section('title','Dashboard Member')
  @endif

  @if(Auth::user()->level == 'staff')

    @section('title','Dashboard Staff')

    @section('content')
        <div class="row">
          
          <div class="col-md-8">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Anggota Member</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Telpon</th>
                    <th>Email</th>
                    <th>Member Sejak</th>
                  </tr>
                  @foreach($member as $e=>$dt)
                  <tr>
                    <td>{{$e+1}}</td>
                    <td>{{$dt->user->name}}</td>
                    <td>{{$dt->phone}}</td>
                    <td>{{$dt->user->email}}</td>
                    <td>{{date('d-M-Y', strtotime($dt->created_at))}}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            
            <div class="box">
              
              <div class="box-header with-border">
                <h3 class="box-title">Koleksi Buku</h3>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Judul</th>
                    <th>Jumlah</th>
                  </tr>
                  @foreach($book as $e=>$dt)
                  <tr>
                    <td>{{$e+1}}</td>
                    <td>{{$dt->title}}</td>
                    <td>{{$dt->stock}}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.box-body -->

            </div>
          </div>
          <!-- /.col -->
        </div>

        <div class="row">

          <div class="col-md-12">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Riwayat Buku Sedang Dipinjam</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Buku</th>
                    <th>Kode Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Waktu Pinjam</th>
                    <th>Status</th>
                  </tr>
                  @foreach($borrow as $e=>$dt)
                  <tr>
                    <td>{{$e+1}}</td>
                    <td>{{$dt->codebook->book->title}}</td>
                    <td>{{$dt->codebook->code}}</td>
                    <td>{{$dt->member->user->name}}</td>
                    <td>{{ date('d-M-Y', strtotime($dt->created_at))}}</td>
                    <td>{{ date('H: i s', strtotime($dt->created_at))}}</td>
                    <td>{{ ($dt->action == 'borrow') ? 'Dipinjam' : 'Error' }}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
    @endsection

  @endif
  <!-- End - Dashboard Adminlte -->
@endif


