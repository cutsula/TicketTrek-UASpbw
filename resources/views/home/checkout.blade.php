@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span><a href="product.html">Check Out <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h2 class="mb-0 bread">Check Out</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table mt-5">
                            <thead class="bg-danger text-white">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Wisata</th>
                                    <th>Harga</th>
                                    <th>Jumlah Beli</th>
                                    <th>SubHarga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php $totalbelanja = 0; ?>
                                @if (!empty(session('keranjang')))
                                    @foreach ($keranjang as $idwisata => $jumlah)
                                        @php
                                            $wisata = DB::table('wisata')->where('idwisata', $idwisata)->first();
                                            $totalharga = $wisata->harga * $jumlah;
                                        @endphp
                                        <tr class="text-center">
                                            <td><?php echo $nomor; ?></td>
                                            <td>{{ $wisata->judul }}</td>
                                            <td>Rp {{ number_format($wisata->harga) }}</td>
                                            <td>{{ $jumlah }}</td>
                                            <td>Rp {{ number_format($totalharga) }}</td>
                                        </tr>
                                        <?php $nomor++; ?>
                                        <?php $totalbelanja += $totalharga; ?>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-xl-12 ftco-animate">
                    <form method="post" action="{{ url('home/docheckout') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" readonly value="{{ session('pengguna')->nama }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone Pelanggan</label>
                                    <input type="text" readonly value="{{ session('pengguna')->telepon }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                                </div>
                                <input type="hidden" id="dua" name="dua" value="{{ $totalbelanja }}">
                                <div class="form-group">
                                    <label>Total Belanja</label>
                                    <input class="form-control" id="result" value="{{ rupiah($totalbelanja) }}" required
                                        readonly type="text">
                                </div>
                                <button class="btn btn-danger pull-right btn-lg" name="checkout">Checkout</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
