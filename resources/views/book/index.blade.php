@extends('layouts.admin.default')

@if(!Auth::user())
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

  @section('title','Buku')

  @section('content')
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Koleksi Buku
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          @foreach($data as $dt)
            <div class="col-md-3 col-xs-6">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-body">
                    <a href="#" data-toggle="modal" data-target="#{{$dt->id}}">
                        <img class="img-responsive pad" src="{{ url('uploads/'.$dt->image_cover)}}" alt="Photo">
                    </a>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="modal modal-primary fade" id="">
              <div class="modal-dialog">
                <div class="modal-content">
                <!-- Profile Image -->
                  <div class="box box-danger">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive" src="{{ url('uploads/'.$dt->image_cover)}}" alt="User profile picture">

                      <h3 class="profile-username text-center">{{$dt->title}}</h3>

                      <p class="text-muted text-center">{{ $dt->category->name}}</p>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.modal-content -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                  </div>
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="{{$dt->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Buku</h4>
                  </div>
                  <div class="modal-body">
                    <img class="profile-user-img img-responsive" src="{{ url('uploads/'.$dt->image_cover)}}" alt="User profile picture">

                      <h3 class="profile-username text-center">{{$dt->title}}</h3>

                      <p class="text-muted text-center">{{ $dt->category->name}}</p>
                  </div>
                  <div class="modal-footer">
                    <p class="pull-left">
                        <b>Deskripsi : </b>{{ $dt->description}}
                    </p>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          @endforeach
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
  @endsection

@else

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
      <li><a href="#">Home</a></li>
      <li class="active">Buku</li>
    </ol>
  @endsection

  @section('content')

        <div class="row">
          <div class="col-xs-12">
            <div class="box box-warning">
              <div class="box-header">
                @if(Auth::user()->level == "staff")
                <a href="{{ url('/buku/form-tambah') }}" class="btn btn-flat btn-sm btn-primary">Tambah Buku</a>
                @endif
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Sampul</th>
                    <th>Nama Buku</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Detail</th>
                    @if(Auth::user()->level == 'staff')
                      <th>Edit</th>
                      <th>Hapus</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $e=>$dt)
                  <tr>
                    <td>{{$e+1}}</td>
                      <td><img src="{{ asset('uploads/'.$dt->image_cover) }}" style="width: 50px;"></td>
                      <td>{{$dt->title}}</td>
                      <td>{{ (($dt->category_id != Null) ? $dt->category->name : 'Tidak Ada Kategori') }}</td>
                      @if(Auth::user()->level == 'staff')
                        <td>{{$dt->stock}}</td>
                      @else
                        <td>{{$dt->stock - $code_book->where('book_id', $dt->id)->where('status', 'lost')->count()}}</td>
                      @endif
                      <td>
                        <a class="btn btn-flat btn-xs btn-info" href="{{url('/buku/list/'.$dt->id)}}"><i class="fa fa-list"></i></a>
                      </td>
                        @if(Auth::user()->level == "staff")
                        <td>
                        <a class="btn btn-flat btn-xs btn-warning" href="{{url('/buku/form-edit/'.$dt->slug)}}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                        <form role="form" method="POST" action="{{url('/buku/hapus/'.$dt->id)}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-flat btn-xs btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini: {{ $dt->title }} ?')">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                        </td>
                        @endif
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