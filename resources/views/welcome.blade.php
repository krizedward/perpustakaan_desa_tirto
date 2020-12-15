<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="halaman-utama">
    <meta name="author" content="rumah_cerdas">
    <title>Rumah Cerdas | Halaman Utama</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700|Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="{{ asset('rumah_cerdas/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('rumah_cerdas/css/main.css') }}">

</head>

<body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark cyan fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ asset('rumah_cerdas/images/logo.png') }}" alt="nav-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('video.guest') }}">Video</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="https://www.tirtomoyo.desa.id/" target="_blank">
                        Desa Tirtomuyo
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--/.Navbar -->
    <!--Carousel Wrapper-->
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!-- banner -->
            @foreach($banners as $e=>$banner)
              @if($e == 0)
                <div class="carousel-item active">
              @else
                <div class="carousel-item">
              @endif
              <img class="d-block w-100" src="{{ asset('uploads/info/'.$banner->image) }}" alt="{{ $banner->caption }}">
              <div class="gradient"></div>
              <!-- 
              <div class="carousel-caption">
                <h1>Woman walking in the green fields.</h1>
                <p class="lead">Woman walking in the green fields...</p>
                <a class="btn btn-primary" href="about.html"><span>Learn more</span></a>
              </div> -->  
            </div>
            @endforeach
            <!-- end-banner -->
        </div>
        <!--/.Slides-->
        <!--/.Controls-->
        <!-- <ol class="carousel-indicators">
            <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="images/banner-image-4.jpg" class="img-fluid">
                <span>Woman walking in the green fields</span>
            </li>
            <li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="images/banner-image-3.jpg" class="img-fluid">
                <span>Remainings of old boat in the beach of bali.</span>
            </li>
            <li data-target="#carousel-thumb" data-slide-to="2"><img class="d-block w-100" src="images/banner-image-2.jpg" class="img-fluid">
                <span>Beautiful sunsetting in the mountains.</span>
            </li>
            <li data-target="#carousel-thumb" data-slide-to="3"><img class="d-block w-100" src="images/banner-image-1.jpg" class="img-fluid">
                <span>Snow white mountain of east china.</span>
            </li>
        </ol> -->
    </div>
    <!--/.Carousel Wrapper-->

    <!-- Page Content -->

    <section id="portfolio">
        <div class="container">
            <h2>Koleksi Buku Rumah Cerdas</h2>
            <div class="row justify-content-center">
                <div class="col-md-12 col-12">
                    <div class="row">
                      @foreach($books as $book)
                        <!-- box -->
                        <a href="{{ url('uploads/'.$book->image_cover)}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-xl-3 col-md-4 box-2">
                         <img src="{{ url('uploads/'.$book->image_cover)}}" class="img-fluid">
                           <div class="overlay">
                             <div class="text">{{ $book->title }}</span></div>
                           </div>
                        </a>
                        <!-- end-box -->
                        @endforeach
                    </div>  
                </div>
                <!-- Link Untuk Paginate -->
                <!-- <div class="col-md-12 text-center">
                  {{ $books->links() }}
                </div> -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <section class="footer-top">
            <!--Container-->
            <div class="container">
                <h2>Footer</h2>
                <div class="row text-center">
                    <div class="col-lg-12 col-md-4 col-xs-6">
                        <a href="#" class="d-block h-100"><img class="img-fluid img-thumbnail" src="images/banner-image-1.jpg" alt=""></a>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </section>
        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright © 2020 Pemerintah Desa Tirtomoyo | Supported by @Community Service Binus@Malang. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </section>
    </footer>

    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
</body>

</html>
