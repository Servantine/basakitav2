<?php

namespace App\Http\Controllers;

use App\Models\Transaksis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Bank;

class PageController extends Controller
{
    function index()
    {
        $nama = Auth::user()->name;
        return view('/warlok/dashboard');
    }
    function warlok()
    {
        $nama = Auth::user()->name;
        $langganan = Auth::user()->langganan;
        $bank = Bank::all();
        return view('/warlok/dashboard', ['key' => 'nama', 'nama' => $nama, 'langganan' => $langganan, 'bank' => $bank]);
    }
    function pengantar()
    {
        $nama = Auth::user()->name;
        return view('/pengantar/dashboard');
    }
    function pemilik()
    {
        $nama = Auth::user()->name;
        return view('/pemilik/dashboard');
    }
    function kirimsampah()
    {
        $pengantar = Users::where('roles', 'pengantar')->get();
        $nama = Auth::user()->name;
        $alamat = Auth::user()->alamat;
        $langganan = Auth::user()->langganan;
        $bank = Bank::where('nama_bank', $langganan)->first();

        if ($bank) {
            $harga = $bank->harga_sampah;
        }
        return view('/warlok/kirimsampah', ['key' => 'users', 'nama' => $nama, 'alamat' => $alamat, 'langganan' => $langganan, 'pengantar' => $pengantar, 'harga' => $harga]);
    }
    public function simpantransaksi(Request $request)
    {
        $input = $request->all();


        Transaksis::create($input);

        $nama = Auth::user()->name;
        $user = Users::where('name',$nama)->first();
        $user->tagihan = $user->tagihan + $request->tagihan;
        $user->save();

        $transaksis = Transaksis::where('nama_pengirim', $nama)->paginate(5);

        return redirect('/riwayatkirim');

    }

    function riwayatkirim()
    {
        $nama = Auth::user()->name;
        $transaksis = Transaksis::where('nama_pengirim', $nama)->paginate(5);
        // return dd($mhs);
        return view('/warlok/riwayatkirim', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    function kelolabanksampah()
    {
        $pemilik = Auth::user()->name;
        $bank = Bank::where('nama_pemilik', $pemilik)->paginate(2);
        // return dd($mhs);
        return view('/pemilik/kelolabanksampah', ['key' => 'bank', 'bank' => $bank]);
    }
    function buatbanksampah()
    {
        $pemilik = Auth::user()->name;
        return view('/pemilik/buatbanksampah', ['key' => 'pemilik', 'pemilik' => $pemilik]);
    }
    function editbanksampah($id, Request $request)
    {
        $bank = Bank::find($id);
        $bank2 = Bank::all();
        $pemilik = Auth::user()->name;
        return view('/pemilik/editbanksampah', ['key' => 'pemilik', 'pemilik' => $pemilik, 'bank' => $bank, 'bank2' => $bank2]);
    }
    function saveeditbanksampah($id, Request $request)
    {
        $input = $request->all();
        $bank = Bank::find($id);
        $bank->update($input);
        return redirect('/pemilikkembali');
    }
    public function simpanbanksampah(Request $request)
    {
        $input = $request->all();

        $user = Auth::user();
        $user->langganan = $request->nama_bank;
        $user->save();
        Bank::create($input);

        return redirect('/pemilikkembali');

    }

    function permintaansampah()
    {
        $langganan = Auth::user()->langganan;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        // return dd($mhs);
        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    public function terimatransaksi($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Belum Dibayar";
        $transaksi->save();

        $langganan = Auth::user()->langganan;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        // return dd($mhs);
        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    public function lakukanpembayaran($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Dibayar";
        $transaksi->save();

        $nama = Auth::user()->name;

        $user = Users::where('name',$nama)->first();
        $user->tagihan = $user->tagihan - $transaksi->tagihan;
        $user->save();

        
        $transaksis = Transaksis::where('nama_pengirim', $nama)->paginate(5);

        // return dd($mhs);
        return view('/warlok/riwayatkirim', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    public function tolaktransaksi($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Ditolak";
        $transaksi->save();

        $langganan = Auth::user()->langganan;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        // return dd($mhs);
        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    public function selesaitransaksi($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Diselesaikan";
        $transaksi->save();

        $langganan = Auth::user()->langganan;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        if ($transaksi) {
            $namabank = $transaksi->tujuan_bank;
            $namapengirim = $transaksi->nama_pengirim;
        }
        // return dd($mhs);

        $bank = Bank::where('nama_bank', $namabank)->first();
        if ($bank) {
            if ($bank->status == 'kosong') {
                $bank->status = 'terisi';
            }
            $bank->jumlah_sampah = $bank->jumlah_sampah + $transaksi->berat_sampah;
            $hargasampah = $bank->harga_sampah;
            $user = Users::where('name', $namapengirim)->first();
            $bank->save();
        }

        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
}
