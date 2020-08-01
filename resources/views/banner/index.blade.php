@if(Auth::user()->level == "staff")
  @extends('layouts.admin.default')

  @section('title', 'Banner')

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
      Banner
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="active">Banner</li>
    </ol>
  @endsection

  @section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <a href="{{ url('/banner/create') }}" class="btn btn-flat btn-sm btn-primary">Tambah Banner</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Gambar</th> <!-- Alias untuk 'image'. -->
                  <th>Deskripsi</th> <!-- Alias untuk 'caption'. -->
                  <!-- <th>Status</th> --> <!-- Pengembangan berikutnya: Banner status 'aktif' dan 'nonaktif' sehingga dapat melakukan arsip banner yang tidak ditampilkan. -->
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $e=>$dt)
                  <tr>
                    <td>{{$e+1}}</td>
                    <td><img src="{{ asset('uploads/info/'.$dt->image) }}" style="width: 100px;"></td>
                    <td>{{$dt->caption}}</td>
                    <!-- <td>{{$dt->status}}</td> -->
                    <td>
                      <a class="btn btn-flat btn-xs btn-warning" href="{{url('/banner/edit/'.$dt->id)}}"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                      <form role="form" method="POST" action="{{url('/banner/destroy/'.$dt->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-flat btn-xs btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus banner ini: {{ $dt->caption }} ?')"><i class="fa fa-trash"></i></button>
                      </form>
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
@endif