@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/home/images/wisata.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i
                                    class="fa fa-chevron-right"></i></a></span><span>Login <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Login</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="ftco-section">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <img width="100%" src="{{ asset('foto/daftar.png') }}">
                </div>
                <div class="col-md-7 my-auto">
                    @if (session('alert'))
                        <div class="alert alert-primary">{{ session('alert') }}</div>
                    @endif
                    <form method="post" action="{{ url('home/dologin') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <br>
                        <button class="btn btn-danger btn-block" name="simpan">Masuk</button>
                    </form>
                </div>
            </div>
    </section>
@endsection
