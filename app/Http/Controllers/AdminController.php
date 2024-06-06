<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function kategori()
    {
        $data['kategori'] = DB::table('kategori')->get();
        return view('admin.kategori', $data);
    }

    public function tambahkategori()
    {

        return view('admin.tambahkategori');
    }

    public function simpankategori(Request $request)
    {
        $data = [
            'namakategori' => $request->kategori,
            'idkategori' => $request->kategori,
        ];
        KategoriModel::create($data);
        session()->flash('alert', 'Berhasil menambahkan data!');
        return redirect('admin/kategori');
    }

    public function ubahkategori($id)
    {
        $data['kategori'] = KategoriModel::where('idkategori', $id)->first();
        return view('admin.ubahkategori', $data);
    }

    public function updatekategori(Request $request, $id)
    {
        $data = [
            'namakategori' => $request->kategori
        ];
        KategoriModel::where('idkategori', $id)->update($data);
        session()->flash('alert', 'Berhasil mengubah data!');
        return redirect('admin/kategori');
    }

    public function hapuskategori($id)
    {
        KategoriModel::where('idkategori', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/kategori');
    }

    public function wisata()
    {
        // $properti = DB::table('properti')->leftJoin('kategori', 'properti.idkategori', '=', 'kategori.idkategori')->get();
        $wisata = DB::table('wisata')->get();
        $data['wisata'] = $wisata;
        return view('admin.wisata', $data);
    }

    public function tambahwisata()
    {
        return view('admin.tambahwisata');
    }

    public function simpanwisata(Request $request)
    {
        $namafoto = $request->file('foto')->hashName();
        $request->file('foto')->move(public_path('foto'), $namafoto);

        DB::table('wisata')->insert([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'lokasi' => $request->input('lokasi'),
            'foto' => $namafoto,
            'created_at' => date('Y-m-d'),
        ]);
        session()->flash('alert', 'Berhasil menambah data!');

        return redirect('admin/wisata');
    }

    public function ubahwisata($id)
    {
        $data['wisata'] = DB::table('wisata')->where('idwisata', $id)->first();
        return view('admin.ubahwisata', $data);
    }

    public function updatewisata(Request $request, $id)
    {
        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'lokasi' => $request->input('lokasi'),
        ];
        $wisata = DB::table('wisata')->where('idwisata', $id)->first();
        $fotoPath = public_path('foto/' . $wisata->foto);
        if ($request->hasFile('foto')) {
            $namafoto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto'), $namafoto);
            $data['foto'] = $namafoto;
        }
        DB::table('wisata')->where('idwisata', $id)->update($data);
        session()->flash('alert', 'Berhasil mengubah data!');
        return redirect('admin/wisata');
    }

    public function hapuswisata($id)
    {
        DB::table('wisata')->where('idwisata', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/wisata');
    }

    public function pengguna()
    {
        $pengguna = DB::table('pengguna')->where('level', 'Pelanggan')->get();

        $data = [
            'pengguna' => $pengguna,
        ];

        return view('admin.pengguna', $data);
    }

    public function logout()
    {
        session()->flush();
        return redirect('home')->with('alert', 'Anda Telah Logout');
    }

    public function transaksi()
    {
        $transaksi = DB::table('transaksi')->join('pengguna', 'pengguna.id', '=', 'transaksi.id')
            ->orderBy('transaksi.tanggalbeli', 'desc')->orderBy('transaksi.idtransaksi', 'desc')->get();

        $datawisata = [];
        foreach ($transaksi as $row) {
            $idtransaksi = $row->idtransaksi;
            $wisata = DB::table('pembelianwisata')
                ->join('wisata', 'pembelianwisata.idwisata', '=', 'wisata.idwisata')
                ->where('idtransaksi', $idtransaksi)
                ->get();
            $datawisata[$idtransaksi] = $wisata;
        }


        $data = [
            'transaksi' => $transaksi,
            'datawisata' => $datawisata,
        ];
        return view('admin.transaksi', $data);
    }

    public function pembayaran($id)
    {
        $datatransaksi = DB::table('transaksi')->join('pengguna', 'pengguna.id', '=', 'transaksi.id')
            ->where('transaksi.idtransaksi', $id)->first();
        $datawisata = DB::table('pembelianwisata')
            ->join('wisata', 'pembelianwisata.idwisata', '=', 'wisata.idwisata')
            ->where('idtransaksi', $id)
            ->get();

        $pembayaran = DB::table('pembayaran')->where('idtransaksi', $id)->first();

        $data = [
            'datatransaksi' => $datatransaksi,
            'datawisata' => $datawisata,
            'pembayaran' => $pembayaran,
        ];

        return view('admin.pembayaran', $data);
    }

    public function simpanpembayaran($id, Request $request)
    {
        if ($request->has('proses')) {
            $statusbeli = $request->input('statusbeli');
            DB::table('transaksi')->where('idtransaksi', $id)->update([
                'statusbeli' => $statusbeli,
            ]);
            return redirect('admin/transaksi');
        }
    }

    public function hapuspembayaran($id)
    {
        DB::table('transaksi')->where('idtransaksi', $id)->delete();
        DB::table('pembayaran')->where('idtransaksi', $id)->delete();
        DB::table('pembelianwisata')->where('idtransaksi', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/transaksi');
    }
}
