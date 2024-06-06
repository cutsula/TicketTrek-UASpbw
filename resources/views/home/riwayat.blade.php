@extends('home.templates.index')

@section('page-content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/home/images/wisata.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a>Home <i
                                    class="fa fa-chevron-right"></i></a></span><span>Riwayat Pembelian <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Riwayat Pembelian</h2>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section id="home-section" class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="bg-danger text-white">
                                <tr class="text-center">
                                    <th width="10px">No</th>
                                    <th width="25%">Daftar</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Opsi</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                @foreach ($databeli as $db)
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td>
                                            <ul>
                                                @foreach ($datawisata[$db->idtransaksi] as $dp)
                                                    <li>
                                                        {{ $dp->judul }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{!! tanggal($db->tanggalbeli) . '<br>' . date('H:i', strtotime($db->waktu)) !!}
                                        </td>
                                        <td>Rp {{ number_format($db->totalbeli) }}</td>
                                        <td class="text-center">
                                            <?php if ($db->statusbeli == "Belum Bayar") {
                                        $deadline = date('Y-m-d H:i', strtotime($db->waktu . ' +1 day'));
                                        $harideadline = date('Y-m-d', strtotime($db->waktu . ' +1 day'));
                                        $jamdeadline = date('H:i', strtotime($db->waktu  . ' +1 day'));
                                        if (date('Y-m-d H:i') >= $deadline) {
                                            echo 'Waktu pembayaran<br>telah habis';
                                        } else { ?>
                                            <a href="{{ url('home/pembayaran/' . $db->idtransaksi) }}"
                                                class="btn btn-danger">Upload
                                                Bukti<br>Pembayaran
                                                Sebelum<br><?= tanggal($harideadline) . ' - Jam ' . $jamdeadline ?></a>
                                            <?php }
                                    } elseif ($db->statusbeli == "Sudah Upload Bukti Pembayaran") { ?>
                                            <a class="btn btn-danger text-white">Menunggu Konfirmasi Admin</a>
                                            <?php } elseif ($db->statusbeli == "Di Terima, Silahkan Cetak Tiket") { ?>
                                            <a class="btn btn-danger text-white"
                                                href="{{ url('home/cetaktiket/' . $db->idtransaksi) }}">Cetak Tiket</a>
                                            <?php } elseif ($db->statusbeli == "Selesai") { ?>
                                            <label class="btn btn-success">Selesai</label>
                                            <?php } elseif ($db->statusbeli == "Pesanan Di Tolak") { ?>
                                            <a class="btn btn-danger text-white">Pesanan Anda Di Tolak</a>
                                            <?php } ?>
                                        </td>
                                        <td><img width="100px" src="{{ url('buktitransaksi/' . $db->bukti) }}"
                                                alt="">
                                        </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
