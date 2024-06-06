@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/home/images/wisata.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Wisata <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h2 class="mb-0 bread">Wisata</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($wisata as $p)
                    <div class="col-md-4 d-flex">
                        <div class="product ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center"
                                style="background-image: url('{{ asset('foto/' . $p->foto) }}');">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="{{ url('home/detailwisata/' . $p->idwisata) }}"
                                            class="d-flex align-items-center justify-content-center"><span
                                                class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <span class="category">{{ $p->judul }}</span>
                                <h2>{!! $p->lokasi !!}</h2>
                                <p class="mb-0"><span class="price price-sale"></span> <span class="price">Rp
                                        {{ number_format($p->harga) }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $wisata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
