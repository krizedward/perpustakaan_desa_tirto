<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="koleksi_video">
    <meta name="author" content="rumah_cerdas">
    <title>Rumah Cerdas | Koleksi Video</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('video.guest') }}">Video <span class="sr-only">(current)</span>
                        </a>
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

    <!-- Page Content -->

    <!-- Blog-Section -->
    <section class="blog-single">
        <div class="container">
            <div class="main-contant">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Koleksi Video Rumah Cerdas</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($data as $dt)
                    <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-md-6 box-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php
                              $dt->link = implode( 'embed/', explode('watch?v=', $dt->link) );
                              if(strrpos($dt->link, '&', -1)) {
                                $dt->link = substr($dt->link, 0, strrpos($dt->link, '&', -1));
                              }
                            ?>
                            <iframe class="embed-responsive-item" src="{{ $dt->link }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </a>
                    @endforeach
                </div><!-- 
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Read Comments Posted</h2>
                    </div>
                </div>
                <form class="form">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Enter your name  " required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="email" class="form-control" placeholder=" Enter your email" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder=" Enter your website" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" rows="5" placeholder="Write your message" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit Comment</button>
                </form>
                <div class="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Comments Posted (4)</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="col1">
                                <p><strong><span>12.06.2016</span>Manish Tiwari</strong>Wow...Wow.....i really like the way you write the to the articles about your photography, they are really awesome thanks a lot for sharing</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="col1">
                                <p><strong><span>12.06.2016</span>Mahender Singh</strong>Really like the way you write the articles about your photography</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="col1">
                                <p><strong><span>12.06.2016</span>Sudharshan Karnati</strong>Really like the way you write the articles about your photography</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Support section Ended -->
    <!--/.Portfolio-Section -->

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
