<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ticket Trek</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/home/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

</head>
@if (session('alert'))
    <script>
        alert("{{ session('alert') }}");
    </script>
@endif
<div class="wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                </center>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-danger ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"
    style="background-color: red;">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('home') }}"> <img src="" width="30px"
                style="border-radius: 10px;">&nbsp; Ticket Trek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('home') }}" class="nav-link text-light">Home</a></li>
                <li class="nav-item active"><a href="{{ url('home/wisata') }}" class="nav-link text-light">Wisata</a>
                </li>
                @if (session('pengguna'))
                    <?php $akun = session('pengguna'); ?>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ url('home/akun') }}">Profil Akun</a>
                            <a class="dropdown-item" href="{{ url('home/keranjang') }}">Keranjang</a>
                            <a class="dropdown-item" href="{{ url('home/riwayat') }}">Riwayat Pembelian</a>
                            <a class="dropdown-item" href="{{ url('home/logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item active"><a href="{{ url('home/daftar') }}"
                            class="nav-link text-light">Daftar</a>
                    </li>
                    <li class="nav-item active"><a href="{{ url('home/login') }}" class="nav-link text-light">Login</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

@yield('page-content')

<footer class="ftco-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Alamat</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map marker"></span><span class="text">Jl. Srijaya Negara,
                                    Bukit Lama, Kec. Ilir Bar. I, Kota Palembang, Sumatera Selatan</span></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Kontak</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-whatsapp"></span><span class="text">0857-6450-3362</span>
                            </li>
                            <li><span class="icon fa fa-instagram"></span><span
                                    class="text">tickettrek@gmail.com</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ftco-footer-widget mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.411399796647!2d104.72847778885496!3d-2.9832188999999882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75ec487f021d%3A0x63054012aa39de4f!2sPoliteknik%20Negeri%20Sriwijaya!5e0!3m2!1sen!2sid!4v1701670632260!5m2!1sen!2sid"
                        width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="5" stroke="#F96D00" />
    </svg></div>

<script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/home/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/home/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/home/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&sensor=false"></script>
<script src="{{ asset('assets/home/js/google-map.js') }}"></script>
<script src="{{ asset('assets/home/js/main.js') }}"></script>


</body>

</html>
