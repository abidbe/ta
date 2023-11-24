<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="{{asset('lp/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="{{asset('lp/assets/fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('lp/assets/css/baguetteBox.min.css')}}">
    <link rel="stylesheet" href="{{asset('lp/assets/css/vanilla-zoom.min.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar navbar-light">
        <div class="container"><a class="navbar-brand logo" href="#"><img width="75" height="45" src="{{asset('lp/assets/img/Screenshot%202023-10-25%20221751.png')}}"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pe-1"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image: url(&quot;{{asset('lp/assets/img/alat1.jpg')}}&quot;);color: rgba(0, 0, 0, 0.463);background-size: cover !important;background-position: center;">
            <div class="text" style="background: rgba(0,0,0,0);border-radius: 24px;">
                <h2 class="mb-0" style="color: #f8f9fc;font-weight: bold;font-family: Montserrat, sans-serif;">PT. JAMBI BARA SEJAHTERA</h2>
                <h4 class="mb-4" style="font-family: 'EB Garamond', serif;color: #f8f9fc;">MINING COMPANY</h4>
                <p class="mb-3" style="color: #f8f9fc;font-family: Montserrat, sans-serif;">Perusahaan yang bergerak dibidang jasa pertambangan batubara.</p><button class="btn btn-outline-light btn-lg mb-3" type="button">Learn More</button>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="p-5">
                    <h2 class="text-info text-center">Info</h2>
                    <p class="text-center p-5 pt-4">Perseroan adalah perusahaan yang bergerak dibidang jasa pertambangan batubara yang didirikan pada 27 Juni 2022 bedasarkan Akta Pendirian perusahaan dan Ijin Usaha Jasa Pertambangan yang dikeluarkan oleh Direktorat Jendral Mineral dan Batubara.<br>PT. Jambi Bara Sejahtera beroperasi di salah satu Provinsi yang ada di Indonesia, yaitu Provinsi Jambi, tepatnya di Kabupaten Batanghari. Perseroan ini di tangani oleh para tenaga ahli yang sudah berpengalaman dalam bidang pertambangan di Provinsi Jambi.<br><br></p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" width="100%" height="400"></iframe></div>
                    <div class="col-md-6">
                        <h3>Lokasi</h3>
                        <div class="getting-started-info">
                            <p>Perumahan Telanai Indah Estate Blok M No 12,<br>Pematang Sulur, Telanaipura, Kota Jambi, Jambi</p><a class="btn btn-outline-primary btn-lg" href="https://maps.app.goo.gl/YVmEZrXsRW489ztZ8" type="button" target="_blank">Google Maps</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Jajaran Direksi</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box">
                        <h4>Rudi Wijaya</h4>
                        <p>Komisaris Utama</p>
                    </div>
                    <div class="col-md-5 feature-box">
                        <h4>Mardedi Susanto</h4>
                        <p>Komisaris</p>
                    </div>
                    <div class="col-md-5 feature-box">
                        <h4>Margono</h4>
                        <p>Direktur Utama</p>
                    </div>
                    <div class="col-md-5 feature-box">
                        <h4>Agung Rizaldi</h4>
                        <p>Direktur</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Slider</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="w-100 d-block" src="{{asset('lp/assets/img/scenery/image1.jpg')}}" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="{{asset('lp/assets/img/scenery/image4.jpg')}}" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="{{asset('lp/assets/img/scenery/image6.jpg')}}" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                    <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button></div>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="{{asset('lp/assets/img/avatars/avatar1.jpeg')}}">
                            <div class="card-body info">
                                <h4 class="card-title">John Smith</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="{{asset('lp/assets/img/avatars/avatar2.jpeg')}}">
                            <div class="card-body info">
                                <h4 class="card-title">Robert Downturn</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="{{asset('lp/assets/img/avatars/avatar3.jpeg')}}">
                            <div class="card-body info">
                                <h4 class="card-title">Ally Sanders</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2023 Copyright Text</p>
        </div>
    </footer>
    <script src="{{asset('lp/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lp/assets/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('lp/assets/js/vanilla-zoom.js')}}"></script>
    <script src="{{asset('lp/assets/js/theme2.js')}}"></script>
</body>

</html>