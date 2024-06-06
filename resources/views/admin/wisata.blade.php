@extends('admin.templates.index')

@section('page-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url('admin/tambahwisata') }}" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Wisata</a>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Wisata</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="table">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Lokasi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            @foreach ($wisata as $p)
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->deskripsi }}</td>
                                    <td>{{ rupiah($p->harga) }}</td>
                                    <td>{{ $p->lokasi }}</td>
                                    <td>
                                        <img src="{{ asset('foto/' . $p->foto) }}" width="100px">
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/ubahwisata/' . $p->idwisata) }}"
                                            class="btn btn-warning">Ubah</a>
                                        <a href="{{ url('admin/hapuswisata/' . $p->idwisata) }}" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
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
