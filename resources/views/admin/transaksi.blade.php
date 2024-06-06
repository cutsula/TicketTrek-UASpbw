@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Daftar</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($transaksi as $p)
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td>{{ $p->nama }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($datawisata[$p->idtransaksi] as $dp)
                                                <li>
                                                    {{ $dp->judul }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ tanggal(date('Y-m-d', strtotime($p->tanggalbeli))) }}</td>
                                    <td>Rp. {{ number_format($p->totalbeli) }}</td>
                                    <td>{{ $p->statusbeli }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ url('admin/pembayaran/' . $p->idtransaksi) }}"
                                                class="btn btn-info m-1">Detail</a>
                                            <a href="{{ url('admin/hapuspembayaran/' . $p->idtransaksi) }}"
                                                class="btn btn-danger m-1"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                        </div>
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
@endsection
