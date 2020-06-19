@extends('layouts.admin.default')

@section('title', 'Dashboard')

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

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>tabel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      @include('layouts.admin.flash_massage')
      
      @if( Auth::user()->level == 'member')
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ \App\Models\Borrow::where('member_id','=',Auth::user()->member->id)->where('action','!=','request')->count() }}</h3>

              <p>Peminjaman</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="{{ url('/pinjam')}}" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ \App\Models\Returns::where('member_id','=',Auth::user()->member->id)->count() }}</h3>

              <p>Pengembalian</p>
            </div>
            <div class="icon">
              <i class="fa fa-th-large"></i>
            </div>
            <a href="{{ url('/kembali')}}" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      @endif

      @if(Auth::user()->level == 'staff')
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
        <!-- /.col -->
      </div>
      @endif
    </section>
    <!-- /.content -->
@endsection

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