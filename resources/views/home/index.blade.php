@extends('home.templates.index')

@section('page-content')
    <div class="hero-wrap" style="background-image: url('{{ asset('assets/home/images/bgwisata.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class=""></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-8 ftco-animate d-flex align-items-end">
                    <div class="text w-100 text-center">
                        <h1 class="mb-4">Selamat Datang Di <span>Ticket Trek</span>.</h1>
                        <p><a href="{{ url('home/wisata') }}" class="btn btn-danger py-2 px-4">Daftar Wisata</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-intro" style="background-color: #764ca3;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 d-flex">
                    <div class="intro d-lg-flex w-100 ftco-animate" style="background-color: #6953f5;">
                        <div class="icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="text">
                            <h2>Layanan 24 Jam</h2>
                            <p>Melayani Dengan Integritas Dan Pelayanan Yang Terpadu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-1 d-lg-flex w-100 ftco-animate" style="background-color: #6777ef;">
                        <div class="icon">
                            <span class="flaticon-cashback"></span>
                        </div>
                        <div class="text">
                            <h2>Harga Worth It</h2>
                            <p>Kami menjual properti dengan harga paling murah</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-2 d-lg-flex w-100 ftco-animate" style="background-color: #6953f5;">
                        <div class="icon">
                            <span class="flaticon-shopping-bag"></span>
                        </div>
                        <div class="text">
                            <h2>Properti Aman</h2>
                            <p>Properti legal dan bersurat lengkap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/home/images/about.jpg') }}" width="100%" style="border-radius: 10px">
                </div>
                <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
                    <div class="heading-section">

                        <h3 class="mt-4">Tentang kami</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit saepe unde quos nemo nulla, optio
                            officia deleniti fugiat iure, eveniet quis sed quaerat. Adipisci culpa, quia, ratione est dicta
                            dolor, consectetur harum pariatur nesciunt delectus blanditiis itaque vitae quisquam amet.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
