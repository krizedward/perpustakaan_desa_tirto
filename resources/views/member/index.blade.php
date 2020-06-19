@extends('layouts.admin.default')

@section('title', 'Anggota')

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

@section('content-header')
  <h1>
    Anggota
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Anggota</li>
  </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-warning">
            
        <div class="box-header">
          <a href="{{ url('/anggota/form-tambah') }}" class="btn btn-flat btn-sm btn-primary">Tambah Anggota</a>
        </div>
        <!-- /.box-header -->
            
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Berkahir</th>
                  <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e=>$dt)
                <tr>
                  <td>{{$e+1}}</td>
                    <td><img src="{{ asset('uploads/'.$dt->image) }}" style="width: 50px;"></td>
                    <td>{{$dt->user->name}}</td>
                    <td>{{$dt->user->email}}</td>
                    <td>{{$dt->phone}}</td>
                    <td>{{date('d-M-Y', strtotime($dt->expire_at))}}</td>

                    <td>
                      <a class="btn btn-flat btn-xs btn-info" href="{{url('/anggota/detail/'.$dt->id)}}"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-flat btn-xs btn-warning" href="{{url('/anggota/form-edit/'.$dt->id)}}"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-flat btn-xs btn-danger" href="{{url('/anggota/hapus/'.$dt->user->id)}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
	        	    @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
          
      </div>
      <!-- /.box -->
        
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
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