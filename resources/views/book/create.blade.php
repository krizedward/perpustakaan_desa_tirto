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
@endpush

@section('content-header')
      <h1>
        Buku
        <small>Form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Buku</a></li>
        <li class="active">Tambah</li>
      </ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-body">
                <form role="form" method="post" action="{{url('/buku/tambah')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        
                        @if($errors->has('title'))
                        <div class="form-group has-error">
                        <label>Judul Buku</label>
                            <input type="text" name="title" class="form-control" placeholder="Nama Buku.." value="{{ old('title') }}">
                            <span class="help-block">{{ $errors->first('title')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Judul Buku</label>
                            <input type="text" name="title" class="form-control" placeholder="Nama Buku.." value="{{ old('title') }}">
                        </div>
                        @endif

                        @if($errors->has('code'))
                        <div class="form-group has-error">
                        <label>Kode Buku</label>
                            <input type="text" name="code" class="form-control" placeholder="Kode Buku.." value="{{ old('code') }}">
                            <span class="help-block">{{ $errors->first('code')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Kode Buku</label>
                            <input type="text" name="code" class="form-control" placeholder="Kode Buku.." value="{{ old('code') }}">
                        </div>
                        @endif

                        @if($errors->has('description'))
                        <div class="form-group has-error">
                        <label>Keterangan Buku</label>
                            <input type="text" name="description" class="form-control" placeholder="Keterangan Buku.." value="{{ old('description') }}">
                            <span class="help-block">{{ $errors->first('description')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Keterangan Buku</label>
                            <input type="text" name="description" class="form-control" placeholder="Keterangan Buku.." value="{{ old('description') }}">
                        </div>
                        @endif

                        @if($errors->has('stock'))
                        <div class="form-group has-error">
                        <label>Stok Buku</label>
                            <input type="number" min="0" max="999" name="stock" class="form-control" placeholder="Stok Buku.." value="{{ old('stock') }}">
                            <span class="help-block">{{ $errors->first('stock')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Stok Buku</label>
                            <input type="number" min="0" max="999" name="stock" class="form-control" placeholder="Stok Buku.." value="{{ old('stock') }}">
                        </div>
                        @endif

                        @if($errors->has('category'))
                        <div class="form-group has-error">
                        	<label>Kategori</label>
                            <select class="form-control select2" name="category">
                                <option selected="" disabled="">Pilih Kategori</option>
                                @foreach($category as $dt)
                                  @if($dt->id == old('category'))
                                <option value="{{$dt->id}}">{{$dt->name}}</option>
                                  @else
                                <option value="{{$dt->id}}">{{$dt->name}}</option>
                                  @endif
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('category')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        	<label>Kategori</label>
                            <select class="form-control select2" name="category">
                                <option selected="" disabled="">Pilih Kategori</option>
                                @foreach($category as $dt)
                                <option value="{{$dt->id}}">{{$dt->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        @if($errors->has('image_cover')) 
                        <div class="form-group has-error">
                            <label for="exampleInputFile">Cover Sampul</label>
                            <input type="file" name="image_cover" id="exampleInputFile">
                            <span class="help-block">{{ $errors->first('image_cover')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="exampleInputFile">Cover Sampul</label>
                            <input type="file" name="image_cover" id="exampleInputFile">
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

@section('content')
<h1>form</h1>
<form action="{{url('/buku/tambah')}}" method="post" enctype="multipart/form-data">
	@csrf
	<label>Judul Buku</label>
	<input type="text" name="title"><br>
	<label>Keterangan Buku</label>
	<textarea name="description"></textarea><br>
	<label>Stok Buku</label>
	<input type="number" min="0" max="999" name="stock"><br>
	<label>Pilih Kategori</label>
	<select name="category">
		<option selected="" disabled="">Pilih Kategori</option>
		@foreach($category as $dt)
		<option value="{{$dt->id}}">{{$dt->name}}</option>
		@endforeach
	</select><br>
	<label>Cover Sampul</label>
	<input type="file" name="image"><br>
	<button type="submit">Submit</button>
</form>
@endsection