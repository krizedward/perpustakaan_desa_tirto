@extends('layouts.admin.default')

@section('title', 'Form Edit Koleksi Link')


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

<script>
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

@section('content-header')
      <h1>
        Kategori
        <small>Form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Kategori</a></li>
        <li class="active">Edit</li>
      </ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-body">
                <form role="form" method="post" action="{{ route('collectionlink.update',[$data->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="box-body">

                        @if($errors->has('name'))
                        <div class="form-group has-error">
                        <label>Nama Koleksi</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama.." value="{{ $data->name }}">
                            <span class="help-block">{{ $errors->first('name')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Nama Koleksi</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama.." value="{{ $data->name }}">
                        </div>
                        @endif

                        @if($errors->has('link'))
                        <div class="form-group has-error">
                        <label>Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Nama Link.." value="{{ $data->link }}">
                            <span class="help-block">{{ $errors->first('link')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Nama Link.." value="{{ $data->link }}">
                        </div>
                        @endif
       
                    </div>
                    <!-- /.box-body -->
 
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      </div>
      <!-- /.row -->
@endsection