<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Welcome to PT. Jambi Bara Sejahtera</title>
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
                <p class="mb-3" style="color: #f8f9fc;font-family: Montserrat, sans-serif;">Perusahaan yang bergerak dibidang jasa pertambangan batubara.</p><button class="btn btn-outline-light btn-lg mb-3" type="button" onclick="scrollToSection('info')">Kunjungi</button>
            </div>
        </section>
        <section id="info" class="clean-block clean-info dark">
            <div class="container">
                <div class="p-5">
                    <h2 class="text-info text-center">Info</h2>
                    <p class="text-center p-5 pt-4">Perseroan adalah perusahaan yang bergerak dibidang jasa pertambangan batubara yang didirikan pada 27 Juni 2022 bedasarkan Akta Pendirian perusahaan dan Ijin Usaha Jasa Pertambangan yang dikeluarkan oleh Direktorat Jendral Mineral dan Batubara.<br>PT. Jambi Bara Sejahtera beroperasi di salah satu Provinsi yang ada di Indonesia, yaitu Provinsi Jambi, tepatnya di Kabupaten Batanghari. Perseroan ini di tangani oleh para tenaga ahli yang sudah berpengalaman dalam bidang pertambangan di Provinsi Jambi.<br><br></p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.248736593378!2d103.5726862757416!3d-1.6071912360626495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2588418200f5f5%3A0xf4faf91bba7aad68!2sPerumahan%20TELANAI%20INDAH%20ESTATE%20LOKASI%20PT.%20PRADANA%20ADI%20NUGRAHA!5e0!3m2!1sid!2sid!4v1700927690927!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    <div class="col-md-6">
                        <h3>Lokasi</h3>
                        <div class="getting-started-info">
                            <p>Perumahan Telanai Indah Estate Blok M No 12,<br>Pematang Sulur, Telanaipura, Kota Jambi, Jambi</p><a class="btn btn-outline-primary btn-lg" href="https://maps.app.goo.gl/YVmEZrXsRW489ztZ8" type="button" target="_blank">Google Maps</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark d-flex justify-content-center ">
            <p class="text-white">Copyright © PT. Jambi Bara Sejahtera 2023</p>
    </footer>
    <script src="{{asset('lp/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lp/assets/js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('lp/assets/js/vanilla-zoom.js')}}"></script>
    <script src="{{asset('lp/assets/js/theme2.js')}}"></script>
    <script>
        function scrollToSection(sectionId) {
            var section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
</body>

</html>