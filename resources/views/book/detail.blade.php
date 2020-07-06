@extends('layouts.admin.default')

@section('title', 'Buku')

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
    Buku
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">Home</a></li>
    <li class="active">Detail</li>
  </ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Sampul</th>
                  <th>Kode</th>
                  <th>Nama Buku</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $e=>$dt)
                <tr>
                  <td>{{$e+1}}</td>
                    <td><img src="{{ asset('uploads/'.$dt->book->image_cover) }}" style="width: 50px;"></td>
                    <td>{{ $dt->code }}</td>
                    <td>{{ $dt->book->title }}</td>
                    <td>{{ (($dt->book->category_id != Null) ? $dt->book->category->name : 'Tidak Ada Kategori') }}</td>
                    <td>
                        @if($dt->status == "available")
                        <div class="label label-success">Tersedia</a>
                        @else
                        <div class="label label-danger">Tidak Tersedia</a>
                        @endif
                    </td>

                    <td>
                      <a class="btn btn-flat btn-xs btn-info" href="{{url('/buku/detail/'.$dt->book->slug)}}"><i class="fa fa-eye"></i></a>
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