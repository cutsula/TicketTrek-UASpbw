@extends('admin.templates.index')

@section('page-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Wisata</h6>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"
                        action="{{ url('admin/updatewisata/' . $wisata->idwisata) }}">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{ $wisata->judul }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10">{{ $wisata->deskripsi }}</textarea>
                            <script>
                                CKEDITOR.replace('deskripsi');
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="number" class="form-control" name="harga" value="{{ $wisata->harga }}">
                        </div>
                        <div class="form-group">
                            <label>lokasi</label>
                            <input type="text" class="form-control" name="lokasi" value="{{ $wisata->lokasi }}">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="letak-input" style="margin-bottom: 10px;">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <button class="btn btn-danger" name="save"><i
                                class="glyphicon glyphicon-saved"></i>Simpan</a></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
