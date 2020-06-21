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
    Anggota
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">Home</a></li>
    <li><a href="{{ route('member.index') }}">Anggota</a></li>
    <li class="active">Update</li>
  </ol>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12">

      <div class="box box-warning">
        <div class="box-body">
          <form role="form" method="post" action="{{url('/anggota/update/'.$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">

                  @if($errors->has('name'))
                  <div class="form-group has-error">
                  <label>Nama Anggota</label>
                      <input type="text" name="name" class="form-control" placeholder="Nama Anggota.." value="{{ $data->user->name }}">
                      <span class="help-block">{{ $errors->first('name')}}</span>
                  </div>
                  @else
                  <div class="form-group">
                  <label>Nama Anggota</label>
                      <input type="text" name="name" class="form-control" placeholder="Nama Anggota.." value="{{ $data->user->name }}">
                  </div>
                  @endif

                  @if($errors->has('email'))
                  <div class="form-group has-error">
                  <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email Anggota.." value="{{ $data->user->email }}">
                      <span class="help-block">{{ $errors->first('email')}}</span>
                  </div>
                  @else
                  <div class="form-group">
                  <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email Anggota.." value="{{ $data->user->email }}">
                  </div>
                  @endif

                  @if($errors->has('phone'))
                  <div class="form-group has-error">
                  <label>Telpon</label>
                      <input type="phone" name="phone" class="form-control" placeholder="Telpon Anggota.." value="{{ $data->phone }}">
                      <span class="help-block">{{ $errors->first('phone')}}</span>
                  </div>
                  @else
                  <div class="form-group">
                  <label>Telpon</label>
                      <input type="phone" name="phone" class="form-control" placeholder="Telpon Anggota.." value="{{ $data->phone }}">
                  </div>
                  @endif

                </div>

                <div class="col-md-6">

                  @if($errors->has('birthdate'))
                  <div class="form-group has-error">
                  <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Birthdate.." name="birthdate" value="{{ $data->birthdate }}">
                      <span class="help-block">{{ $errors->first('birthdate')}}</span>
                  </div>
                  @else
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" placeholder="Birthdate.." name="birthdate" value="{{ $data->birthdate }}">
                  </div>
                  @endif

                  @if($errors->has('expired'))
                  <div class="form-group has-error">
                  <label>Tanggal Berkhir Anggota</label>
                      <input type="date" class="form-control" placeholder="Berakhir.." name="expired" value="{{ $data->expire_at }}">
                      <span class="help-block">{{ $errors->first('expired')}}</span>
                  </div>
                  @else
                  <div class="form-group">
                  <label>Tanggal Berkhir Anggota</label>
                      <input type="date" class="form-control" placeholder="Berakhir.." name="expired" value="{{ $data->expire_at }}">
                  </div>
                  @endif

                  @if($errors->has('gender'))
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" value="male" checked="">Laki-Laki
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" value="female">Perempuan
                      </label>
                    </div>
                  </div>
                  @else
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" value="male" checked="">Male
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" value="female">Female
                      </label>
                    </div>
                  </div>
                  @endif
                  
                </div>
              </div>
          

              <div class="form-group">
                  <label for="exampleInputFile">Foto Member</label>
                  <input type="file" name="image" id="exampleInputFile">
              </div>
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

@section('old')
  <div class="row">
        <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-body">
                <form role="form" method="post" action="{{url('/anggota/update/'.$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="box-body">
                        
                        @if($errors->has('name'))
                        <div class="form-group has-error">
                        <label>Nama Anggota</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Anggota.." value="{{ $data->user->name }}">
                            <span class="help-block">{{ $errors->first('name')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Nama Anggota</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Anggota.." value="{{ $data->user->name }}">
                        </div>
                        @endif

                        @if($errors->has('phone'))
                        <div class="form-group has-error">
                        <label>Telpon</label>
                            <input type="phone" name="phone" class="form-control" placeholder="Telpon Anggota.." value="{{ $data->phone }}">
                            <span class="help-block">{{ $errors->first('phone')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Telpon</label>
                            <input type="phone" name="phone" class="form-control" placeholder="Telpon Anggota.." value="{{ $data->phone }}">
                        </div>
                        @endif

                        @if($errors->has('gender'))
                        <div class="form-group">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="male" checked="">Male
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="female">Female
                            </label>
                          </div>
                        </div>
                        @else
                        <div class="form-group">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="male" checked="">Laki-Laki
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="female">Perempuan
                            </label>
                          </div>
                        </div>
                        @endif

                        @if($errors->has('birthdate'))
                        <div class="form-group has-error">
                        <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="Birthdate.." name="birthdate" value="{{ $data->birthdate }}">
                            <span class="help-block">{{ $errors->first('birthdate')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="Birthdate.." name="birthdate" value="{{ $data->birthdate }}">
                        </div>
                        @endif

                        @if($errors->has('expired'))
                        <div class="form-group has-error">
                        <label>Tanggal Berkhir Anggota</label>
                            <input type="date" class="form-control" placeholder="Berakhir.." name="expired" value="{{ $data->expire_at }}">
                            <span class="help-block">{{ $errors->first('expired')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Tanggal Berkhir Anggota</label>
                            <input type="date" class="form-control" placeholder="Berakhir.." name="expired" value="{{ $data->expire_at }}">
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="exampleInputFile">Cover Sampul</label>
                            <input type="file" name="image" id="exampleInputFile">
                        </div>
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
