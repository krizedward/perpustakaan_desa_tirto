@extends('layouts.admin.default')

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
  @if(Auth::user()->level == 'member' && Auth::user()->status == 'active')
    @section('title','Dashboard Member')
    @section('content')
        <div class="row">

          <div class="col-md-12">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Buku Yang Harus Dikembalikan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Buku</th>
                    <th>Kode Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                  </tr>
                  @foreach($borrow as $e=>$dt)
                  @if(Auth::user()->id == $dt->member->user->id)
                  <tr>
                    <td>{{$e+1}}</td>
                    <td>{{ $dt->codebook->book->title }}</td>
                    <td>{{ $dt->codebook->code }}</td>
                    <td>{{ date('d-M-Y', strtotime($dt->created_at))}}</td>
                    <td>{{ 
                          $carbon->parse($dt->created_at)->addDays(7)->settings([
                          'toStringFormat' => 'd-M-Y']) 
                        }}
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </table>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">

          <div class="col-md-12">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Buku Yang Pernah Dipinjam</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode Buku</th>
                    <th>Nama Member</th>
                    <th>Tanggal Kembali</th>
                    <th>Waktu Kembali</th>
                    <th>Status</th>
                  </tr>
                  @foreach($done as $e=>$dt)
                    @if(Auth::user()->id == $dt->member->user->id)
                    <tr>
                      <td>{{$e+1}}</td>
                      <td>{{$dt->codebook->code}}</td>
                      <td>{{$dt->codebook->book->title}}</td>
                      <td>{{ date('d-M-Y', strtotime($dt->updated_at))}}</td>
                      <td>{{ date('H: i s', strtotime($dt->updated_at))}}</td>
                      <td>{{ ($dt->action == 'done') ? 'Dikembalikan' : 'Error' }}</td>
                    </tr>
                    @endif
                  @endforeach
                </table>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          
          <div class="col-md-8">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Data Member</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Nama</th>
                    <th>Telpon</th>
                    <th>Email</th>
                    <th>Member Sejak</th>
                  </tr>
                  @foreach($members as $e=>$dt)
                  @if(Auth::user()->id == $dt->user->id)
                  <tr>
                    <td>{{$dt->user->name}}</td>
                    <td>{{$dt->phone}}</td>
                    <td>{{$dt->user->email}}</td>
                    <td>{{date('d-M-Y', strtotime($dt->created_at))}}</td>
                  </tr>
                  @endif
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
                <h3 class="box-title">Buku</h3>
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

        
    @endsection
  @endif

  @if(Auth::user()->level == 'staff')

    @section('title','Dashboard Staff')

    @section('content')
        <div class="row">
          
          <div class="col-md-8">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar Anggota</h3>
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
                    <td>{{$member->count() * ($member->currentPage() - 1) + $e + 1}}</td>
                    <td>{{$dt->user->name}}</td>
                    <td>{{$dt->phone}}</td>
                    <td>{{$dt->user->email}}</td>
                    <td>{{date('d-M-Y', strtotime($dt->created_at))}}</td>
                  </tr>
                  @endforeach
                </table>
                {{ $member->appends(array_except(Request::query(), 'member'))->onEachSide(2)->links() }}
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
                    <td>{{$book->count() * ($book->currentPage() - 1) + $e + 1}}</td>
                    <td>{{$dt->title}}</td>
                    <td>{{$dt->stock}}</td>
                  </tr>
                  @endforeach
                </table>
                {{ $book->appends(array_except(Request::query(), 'book'))->onEachSide(2)->links() }}
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
                <h3 class="box-title">Riwayat Peminjaman Buku</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Buku</th>
                    <th>Kode Buku</th>
                    <th>Nama Member</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                  </tr>
                  @foreach($borrow as $e=>$dt)
                  <tr>
                    <td>{{$borrow->count() * ($borrow->currentPage() - 1) + $e + 1}}</td>
                    <td>{{$dt->codebook->book->title}}</td>
                    <td>{{$dt->codebook->code}}</td>
                    <td>{{$dt->member->user->name}}</td>
                    <td>{{ date('d-M-Y', strtotime($dt->created_at))}}</td>
                    <td>
                      {{ 
                          $carbon->parse($dt->created_at)->addDays(7)->settings([
                          'toStringFormat' => 'd-M-Y']) 
                        }}
                    </td>
                    <td>{{ ($dt->action == 'borrow') ? 'Dipinjam' : 'Error' }}</td>
                  </tr>
                  @endforeach
                </table>
                {{ $borrow->appends(array_except(Request::query(), 'borrow'))->onEachSide(2)->links() }}
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">

          <div class="col-md-12">
            
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Riwayat Pengembalian Buku</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Kode Buku</th>
                    <th>Nama Buku</th>
                    <th>Nama Member</th>
                    <th>Tanggal Kembali</th>
                    <th>Waktu Kembali</th>
                    <th>Status</th>
                  </tr>
                  @foreach($done as $e=>$dt)
                  <tr>
                    <td>{{$done->count() * ($done->currentPage() - 1) + $e + 1}}</td>
                    <td>{{$dt->codebook->code}}</td>
                    <td>{{$dt->codebook->book->title}}</td>
                    <td>{{$dt->member->user->name}}</td>
                    <td>{{ date('d-M-Y', strtotime($dt->updated_at))}}</td>
                    <td>{{ date('H: i s', strtotime($dt->updated_at))}}</td>
                    <td>{{ ($dt->action == 'done') ? 'Dikembalikan' : 'Error' }}</td>
                  </tr>
                  @endforeach
                </table>
                {{ $done->appends(array_except(Request::query(), 'done'))->onEachSide(2)->links() }}
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
    @endsection
  @endif
  <!-- End - Dashboard Adminlte -->

  @if(Auth::user()->level == 'member' && Auth::user()->status == 'unactive')
    @section('title','Dashboard Staff')

    @section('content')
    <h1>Lakukan Registrasi Terlebih Dahulu</h1>
    @endsection
  @endif

