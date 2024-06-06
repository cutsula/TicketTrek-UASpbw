@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/home/images/wisata.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Keranjang </span>
                    </p>
                    <h2 class="mb-0 bread">Keranjang</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="bg-danger text-white">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                @if (!empty(session('keranjang')))
                                    @foreach ($keranjang as $idwisata => $jumlah)
                                        @php
                                            $wisata = DB::table('wisata')->where('idwisata', $idwisata)->first();
                                            $totalharga = $wisata->harga * $jumlah;
                                            // dd($keranjang);
                                        @endphp
                                        <tr class="text-center">
                                            {{-- {{ dd($wisata->harga) }} --}}
                                            <td><?php echo $nomor; ?></td>
                                            <td>{{ $wisata->judul }}</td>
                                            <td class="image-prod">
                                                <img src="{{ asset('foto/' . $wisata->foto) }}" width="100px"
                                                    style="border-radius: 10px;">
                                            </td>
                                            <td>Rp {{ number_format($wisata->harga) }}</td>
                                            <td>
                                                <a href="{{ url('home/hapuskeranjang/' . $wisata->idwisata) }}"
                                                    class="btn btn-danger btn-xs">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $nomor++; ?>
                                    @endforeach
                                @else
                                    <td colspan="7" align="center">Keranjang Kosong</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <a href="{{ url('home/wisata') }}" class="btn btn-warning"><i class="fa fa-cart-plus"></i>Lanjutkan
                    Belanja</a>
                &nbsp;
                @if (!empty(session('keranjang')))
                    <a href="{{ url('home/checkout') }}" class="btn btn-danger">Checkout</a>
                @endif
            </div>
            <br><br>
        </div>
    </section>
@endsection
