@extends('layouts.admin.default')

<!-- Seleksi Guest -->
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

  @section('title','Halaman utama')

  @section('content')
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <div class="box box-default">
          <div class="box-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @foreach($banners as $e=>$banner)
                  @if($e == 0)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$e}}" class="active"></li>
                  @else
                    <li data-target="#carousel-example-generic" data-slide-to="{{$e}}" class=""></li>
                  @endif
                @endforeach
              </ol>
              <div class="carousel-inner">
                @foreach($banners as $e=>$banner)
                  @if($e == 0)
                    <div class="item active">
                  @else
                    <div class="item">
                  @endif
                      <img src="{{ asset('uploads/info/'.$banner->image) }}" alt="{{ $banner->caption }}" style="height:350px; margin: 0 auto;">
                      <div class="carousel-caption">
                        {{ $banner->caption }}
                      </div>
                    </div>
                @endforeach
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
        <div class="box box-default">
        <form action="{{ url('/search') }}" method="get">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Cari Buku Disini...">
            <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
        <!-- /.search form -->
        </div>
      </section>
      <!-- /.content -->
      <section>
        <div class="row">
          @foreach($books as $book)
            <div class="col-md-3 col-xs-12">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-body">
                  <a href="#" data-toggle="modal" data-target="#{{$book->id}}">
                    <img class="img-responsive pad" style="height:350px;" src="{{ url('uploads/'.$book->image_cover)}}" alt="Ini adalah buku {{ $book->title }}">
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
                      <img class="profile-user-img img-responsive" src="{{ url('uploads/'.$book->image_cover)}}" alt="User profile picture">

                      <h3 class="profile-username text-center">{{$book->title}}</h3>

                      <p class="text-muted text-center">{{ $book->category->name}}</p>
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

            <div class="modal fade" id="{{$book->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Buku</h4>
                  </div>
                  <div class="modal-body">
                    <img class="profile-user-img img-responsive" src="{{ url('uploads/'.$book->image_cover)}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$book->title}}</h3>

                    <p class="text-muted text-center">{{ $book->category->name}}</p>
                  </div>
                  <div class="modal-footer">
                    <div class="pull-left text-left">
                      <?php
                        $temp = explode(' ', $book->description);
                        $penulis = '';
                        $penerbit = '';
                        $tahun_terbit = '';
                        for($i = 0; $i < count($temp); $i++) {
                          $temp[$i] = trim($temp[$i]);
                          if($temp[$i] == 'Penulis') {
                            $i+=2;
                            while($temp[$i] != 'Penerbit' && $temp[$i] != 'Tahun') {
                              $penulis = $penulis . $temp[$i] . ' ';
                              $i++;
                              if($i == count($temp)) break;
                            }
                          }
                          if($temp[$i] == 'Penerbit') {
                            $i+=2;
                            while($temp[$i] != 'Penulis' && $temp[$i] != 'Tahun') {
                              $penerbit = $penerbit . $temp[$i] . ' ';
                              $i++;
                              if($i == count($temp)) break;
                            }
                            $penerbit = substr($penerbit, 0, strrpos($penerbit, '.', -1));
                          }
                          if($temp[$i] == 'Terbit') {
                            $i+=2;
                            while($temp[$i] != 'Penulis' && $temp[$i] != 'Penerbit') {
                              $tahun_terbit = $tahun_terbit . $temp[$i] . ' ';
                              $i++;
                              if($i == count($temp)) break;
                            }
                          }
                        }
                      ?>
                      @if($penulis)
                        <p><b>Penulis : </b>{{ $penulis }}</p>
                      @endif
                      @if($penerbit)
                        <p><b>Penerbit : </b>{{ $penerbit }}</p>
                      @endif
                      @if($tahun_terbit)
                        <p><b>Tahun Terbit : </b>{{ $tahun_terbit }}</p>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          @endforeach
        </div>
        <div class="col-md-12 text-center">
          {{ $books->links() }}
        </div>
      </section>
    </div>
    <!-- /.container -->
  @endsection
