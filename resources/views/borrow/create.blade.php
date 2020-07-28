@extends('layouts.admin.default')

@section('title','Tambah Buku')

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

  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
@endpush

@section('content-header')
  <h1>
    Pinjam
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pinjam</a></li>
    <li class="active">Tambah</li>
  </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      @if(Auth::user()->level == 'staff')
        <div class="box box-warning">
          <div class="box-body">
            <form role="form" method="post" action="{{url(Auth::user()->id.'/pinjam/tambah')}}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Pilih Anggota</label>
                  <select class="form-control select2" name="member_id">
                    <option selected="" disabled="">Pilih Anggota</option>
                    @foreach($user as $dt)
                      <option value="{{$member->where('user_id', $dt->id)->first()->id}}">{{$dt->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Buku</label>
                  <select class="form-control select2" name="codebook_id">
                    <option selected="" disabled="">Pilih Buku</option>
                    @foreach($codebook as $dt)
                      @if($dt->status == 'available')
                        <option value="{{$dt->id}}">[ {{$dt->code}} ] {{$dt->book->title}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @if(Auth::user()->level == 'member')
        <div class="box box-warning">
            <div class="box-body">
                <form role="form" method="post" action="{{url(Auth::user()->id.'/pinjam/pending')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                      <input type="hidden" name="member_id" value="{{ Auth::user()->member->id }}">
                        <div class="form-group">
                          <label>Pilih Buku</label>
                            <select class="form-control select2" name="codebook_id">
                                <option selected="" disabled="">Pilih Buku</option>
                                  @foreach($codebook as $dt)
                                    @if($dt->status == 'available')
                                      <option value="{{$dt->id}}">[ {{$dt->code}} ] {{$dt->book->title}}</option>
                                    @endif
                                  @endforeach
                            </select>
                        </div>
       
                    </div>
                    <!-- /.box-body -->
 
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        </div>
      </div>
      <!-- /.row -->
@endsection

@push('script')
<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>

<!-- Page script -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/datatables.buttons.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/buttons.flash.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/jszip.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/pdfmake.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/vfs_fonts.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/buttons.print.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  //Initialize Select2 Elements
  $('.select2').select2()
  
  $(function () {

    $(document).ready( function () {
        // $('.sidebar').click(function(e){
        //   $('.preloader').fadeIn();
        // })

        $('body').on('click','.menu-sidebar',function(e){
          $('.preloader').fadeIn();
        })

        $('.myTable').DataTable();
        $('.summernote').summernote({
          height:300
        });
    });
  })
</script>
@endpush
