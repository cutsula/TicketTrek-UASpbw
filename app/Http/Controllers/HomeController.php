<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
    }

    public function wisata()
    {
        $wisata = DB::table('wisata')->paginate(9);
        $data = [
            'wisata' => $wisata,
        ];
        return view('home/wisata', $data);
    }

    public function kategori($id)
    {
        $properti = DB::table('properti')->leftJoin('kategori', 'properti.idkategori', '=', 'kategori.idkategori')->where('properti.idkategori', $id)->get();
        $kategori = DB::table('kategori')->where('idkategori', $id)->first();

        $data = [
            'properti' => $properti,
            'kategori' => $kategori,
        ];

        return view('home.kategori', $data);
    }

    public function detailwisata($id)
    {
        $wisata = DB::table('wisata')->where('idwisata', $id)->first();
        $data = [
            'wisata' => $wisata,
        ];
        return view('home.detailwisata', $data);
    }

    public function daftar()
    {
        return view('home.daftar');
    }

    public function dodaftar(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $existingUser = DB::table('pengguna')->where('email', $email)->count();

        if ($existingUser == 1) {
            return redirect()->back()->with('alert', 'Pendaftaran Gagal, email sudah ada');
        } else {
            DB::table('pengguna')->insert([
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'alamat' => $alamat,
                'telepon' => $telepon,
                'fotoprofil' => 'Untitled.png',
                'level' => 'Pelanggan'
            ]);

            return redirect('home/login')->with('alert', 'Pendaftaran Berhasil');
        }
    }

    public function login()
    {
        return view('home.login');
    }

    public function dologin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($akun) {
            if ($akun->level == "Pelanggan") {
                session(['pengguna' => $akun]);
                return redirect('home')->with('alert', 'Anda sukses login');
            } elseif ($akun->level == "Admin") {
                session(['admin' => $akun]);
                return redirect('admin')->with('alert', 'Anda sukses login');
            }
        } else {
            return redirect()->back()->with('alert', 'Email atau Password anda salah');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('home')->with('alert', 'Anda Telah Logout');
    }

    public function akun()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }

        $idpengguna = session('pengguna')->id;
        $pengguna = DB::table('pengguna')->where('id', $idpengguna)->first();

        $data = [
            'pengguna' => $pengguna,
        ];
        return view('home.akun', $data);
    }

    public function ubahakun(Request $request, $id)
    {
        $password = $request->input('password');
        if (empty($password)) {
            $password = $request->input('passwordlama');
        }
        DB::table('pengguna')
            ->where('id', $id)
            ->update([
                'password' => $password,
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'telepon' => $request->input('telepon'),
                'alamat' => $request->input('alamat'),
            ]);

        return redirect('home/akun');
    }

    public function pesan(Request $request)
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }

        $idwisata = $request->input('idwisata');
        $jumlah = $request->input('jumlah');
        $keranjang = session()->get('keranjang');

        if ($keranjang === null) {

            $keranjang = [];
        }

        // unset($keranjang[$idwisata]);
        if (isset($keranjang[$idwisata])) {
            $keranjang[$idwisata] += $jumlah;
        } else {
            $keranjang[$idwisata] = $jumlah;
        }

        session(['keranjang' => $keranjang]);
        session()->flash('alert', 'Berhasil menambahkan data ke keranjang');
        return redirect('home/keranjang');
    }

    public function keranjang()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $keranjang = session()->get('keranjang');
        $data = [
            'keranjang' => $keranjang,
        ];
        // session()->flush();
        // dd(session('pengguna'));

        return view('home.keranjang', $data);
    }

    public function hapuskeranjang($id)
    {
        $keranjang = session()->get('keranjang');

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session(['keranjang' => $keranjang]);
        }
        return redirect('home/keranjang');
    }

    public function checkout()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $keranjang = session()->get('keranjang');
        $data['keranjang'] = $keranjang;

        $caripengguna = session('pengguna')->id;
        $pengguna = DB::table('pengguna')->where('id', $caripengguna)->first();
        $data['pengguna'] = $pengguna;
        return view('home.checkout', $data);
    }

    public function docheckout(Request $request)
    {
        $notransaksi = '#TP' . date("Ymdhis");
        $id = session('pengguna')->id;
        $tanggalbeli = date("Y-m-d");
        $waktu = date("Y-m-d H:i:s");
        $totalbeli = $request->input('dua');
        $alamatpengirim = $request->input('alamat');

        DB::table('transaksi')->insert([
            'notransaksi' => $notransaksi,
            'id' => $id,
            'tanggalbeli' => $tanggalbeli,
            'totalbeli' => $totalbeli,
            'alamat' => $alamatpengirim,
            'statusbeli' => 'Belum Bayar',
            'waktu' => $waktu
        ]);

        $keranjang = session()->get('keranjang');
        $idtransaksi = DB::getPdo()->lastInsertId();

        foreach ($keranjang as $idwisata => $jumlah) {
            $wisata = DB::table('wisata')->where('idwisata', $idwisata)->first();
            $idwisata = $wisata->idwisata;
            $judul = $wisata->judul;
            $harga = $wisata->harga;

            $subharga = $wisata->harga * $jumlah;

            DB::table('pembelianwisata')->insert([
                'idtransaksi' => $idtransaksi,
                'idwisata' => $idwisata,
                'judul' => $judul,
                'harga' => $harga,
                'subharga' => $subharga,
                'jumlah' => $jumlah,
            ]);
        }


        session()->forget('keranjang');
        session()->flash('alert', 'Berhasil Checkout');
        return redirect('home/riwayat');
    }

    public function riwayat()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $idpengguna = session('pengguna')->id;
        $databeli = DB::table('transaksi')->join('pengguna', 'transaksi.id', '=', 'pengguna.id')->where('transaksi.id', $idpengguna)->orderBy('idtransaksi', 'DESC')->get();

        $datawisata = [];
        foreach ($databeli as $row) {
            $idtransaksi = $row->idtransaksi;
            $wisata = DB::table('pembelianwisata')
                ->join('wisata', 'pembelianwisata.idwisata', '=', 'wisata.idwisata')
                ->where('idtransaksi', $idtransaksi)->orderBy('idpembelianwisata', 'DESC')
                ->get();
            $datawisata[$idtransaksi] = $wisata;
        }

        $data = [
            'databeli' => $databeli,
            'datawisata' => $datawisata,
        ];

        return view('home.riwayat', $data);
    }

    public function cetakTiket($idtransaksi)
    {
        $transaksi = DB::table('transaksi')->join('pengguna', 'transaksi.id', '=', 'pengguna.id')->where('idtransaksi', $idtransaksi)->first();
        $wisata = DB::table('pembelianwisata')
            ->join('wisata', 'pembelianwisata.idwisata', '=', 'wisata.idwisata')
            ->where('pembelianwisata.idtransaksi', $idtransaksi)
            ->get();

        $view = view('home.cetaktiket', compact('transaksi', 'wisata'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('tiket_' . $transaksi->id . '.pdf');
    }

    public function pembayaran($id)
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $datatransaksi = DB::table('transaksi')->join('pengguna', 'pengguna.id', '=', 'transaksi.id')
            ->where('transaksi.idtransaksi', $id)->first();
        $datawisata = DB::table('pembelianwisata')
            ->join('wisata', 'pembelianwisata.idwisata', '=', 'wisata.idwisata')
            ->where('idtransaksi', $id)
            ->get();

        $data = [
            'datatransaksi' => $datatransaksi,
            'datawisata' => $datawisata,
        ];

        return view('home.pembayaran', $data);
    }

    public function pembayaransimpan(Request $request)
    {
        $namabukti = $request->file('bukti')->getClientOriginalName();
        $namafix = date("YmdHis") . $namabukti;
        $request->file('bukti')->move('buktitransaksi', $namafix);

        $idtransaksi = $request->input('idtransaksi');
        $nama = $request->input('nama');
        $tanggaltransfer = $request->input('tanggaltransfer');
        $tanggal = date("Y-m-d");

        DB::table('pembayaran')->insert([
            'idtransaksi' => $idtransaksi,
            'nama' => $nama,
            'tanggaltransfer' => $tanggaltransfer,
            'tanggal' => $tanggal,
            'bukti' => $namafix,
        ]);

        DB::table('transaksi')->where('idtransaksi', $idtransaksi)->update([
            'statusbeli' => 'Sudah Upload Bukti Pembayaran',
            'bukti' => $namafix
        ]);

        return redirect('home/riwayat')->with('alert', 'Terima kasih');
    }

    public function selesai(Request $request)
    {
        $idpembelian = $request->input('idpembelian');
        DB::table('pembelian')->where('idpembelian', $idpembelian)->update([
            'statusbeli' => 'Selesai'
        ]);
        return redirect('home/riwayat');
    }
}
