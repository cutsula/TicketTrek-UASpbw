@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('foto/home2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i class="fa fa-chevron-right"></i></a></span>
                        <span><a href="product.html">Pembayaran <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h2 class="mb-0 bread">Pembayaran</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="home-section" class="ftco-section">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <table class="">
                        <tr>
                            <td width="150px"><strong>No. transaksi</strong></td>
                            <td>: {{ $datatransaksi->idtransaksi }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: {{ tanggal(date('Y-m-d', strtotime($datatransaksi->tanggalbeli))) }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $datatransaksi->statusbeli }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>: Rp. {{ number_format($datatransaksi->totalbeli) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="">
                        <tr>
                            <td width="150px"><strong>Nama</strong></td>
                            <td>: {{ $datatransaksi->nama }}</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: {{ $datatransaksi->telepon }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $datatransaksi->email }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $datatransaksi->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Properti</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    @foreach ($datawisata as $dp)
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td>{{ $dp->judul }}</td>
                            <td>Rp. {{ number_format($dp->harga) }}</td>
                        </tr>
                        <?php $nomor++; ?>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-5">
                    <img width="100%" src="{{ asset('foto/bayar.webp') }}">
                </div>
                <div class="col-md-7">
                    <p>Kirim Bukti Pembayaran</p>
                    <b>No Rek : 0123 4567 89 (Bank BRI, Atas Nama : Properti SRD)</b>
                    <br>
                    <br>
                    <div class="alert alert-info">Total Tagihan Anda : <strong>Rp.
                            {{ number_format($datatransaksi->totalbeli) }}</strong></div>

                    <form method="post" enctype="multipart/form-data" action="{{ url('home/pembayaransimpan') }}">
                        @csrf
                        <input type="hidden" value="{{ $datatransaksi->idtransaksi }}" name="idtransaksi">
                        <div class="form-group">
                            <label>Nama Rekening</label>
                            <input type="text" name="nama" class="form-control"
                                value="{{ session('pengguna')->nama }}" required>

                        </div>
                        <div class="form-group">
                            <label>Tanggal Transfer</label>
                            <input type="date" name="tanggaltransfer" class="form-control" value="<?= date('Y-m-d') ?>"
                                required>

                        </div>
                        <div class="form-group">
                            <label>Foto Bukti</label>
                            <input type="file" name="bukti" class="form-control" required>
                        </div>
                        <button class="btn btn-danger float-right" name="kirim">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
