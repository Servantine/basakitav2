<?php

namespace App\Http\Controllers;

use App\Models\Transaksis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Bank;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\DB;
use PDF;

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
        $user = Users::where('name', $nama)->first();
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
        $nama = Auth::user()->name;
        $langganan = Auth::user()->langganan;
        $bank = Bank::where('nama_pemilik', $nama)->first();
        $jumlahsampah = $bank->jumlah_sampah;
        $kapasitassampah = $bank->kapasitas_sampah;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        // return dd($mhs);
        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis, 'jumlah_sampah' => $jumlahsampah , 'kapasitas_sampah' => $kapasitassampah]);
    }
    public function terimatransaksi($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Belum Dibayar";
        $transaksi->save();

        $nama = Auth::user()->name;
        $langganan = Auth::user()->langganan;
        $bank = Bank::where('nama_pemilik', $nama)->first();
        $jumlahsampah = $bank->jumlah_sampah;
        $kapasitassampah = $bank->kapasitas_sampah;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        // return dd($mhs);
        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis, 'jumlah_sampah' => $jumlahsampah , 'kapasitas_sampah' => $kapasitassampah]);
    }
    public function lakukanpembayaran($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Dibayar";
        $transaksi->save();

        $nama = Auth::user()->name;

        $user = Users::where('name', $nama)->first();
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

        $nama = Auth::user()->name;
        $langganan = Auth::user()->langganan;
        $bank = Bank::where('nama_pemilik', $nama)->first();
        $jumlahsampah = $bank->jumlah_sampah;
        $kapasitassampah = $bank->kapasitas_sampah;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);
        // return dd($mhs);
        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis, 'jumlah_sampah' => $jumlahsampah , 'kapasitas_sampah' => $kapasitassampah]);
    }
    public function selesaitransaksi($id, Request $request)
    {
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Diselesaikan";
        $transaksi->save();

        $nama = Auth::user()->name;
        $langganan = Auth::user()->langganan;
        $bank = Bank::where('nama_pemilik', $nama)->first();
        $jumlahsampah = $bank->jumlah_sampah;
        $kapasitassampah = $bank->kapasitas_sampah;
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

        return view('/pemilik/permintaansampah', ['key' => 'transaksis', 'transaksi' => $transaksis, 'jumlah_sampah' => $jumlahsampah , 'kapasitas_sampah' => $kapasitassampah]);
    }

    function kelolakendaraan()
    {
        $pengantar = Auth::user()->name;
        $kendaraan = Kendaraan::where('pemilik_kendaraan', $pengantar)->paginate(2);
        // return dd($mhs);
        return view('/pengantar/kelolakendaraan', ['key' => 'kendaraan', 'kendaraan' => $kendaraan]);
    }

    function buatkendaraan()
    {
        $pemilik = Auth::user()->name;
        return view('/pengantar/buatkendaraan', ['key' => 'pemilik', 'pemilik' => $pemilik]);
    }

    public function simpankendaraan(Request $request)
    {
        $input = $request->all();

        $user = Auth::user();
        Kendaraan::create($input);

        return redirect('/pengantarkembali');

    }
    public function banksampahsemua(Request $request)
    {
        $nama = Auth::user()->name;
        $bank = Bank::all();

        return view('/pengantar/banksampah', ['key' => 'bank', 'bank' => $bank]);

    }
    public function lihatpesanan($id, Request $request)
    {
        $user = Auth::user();
        $bank = Bank::find($id);
        $namabank = $bank->nama_bank;
        $nama = Auth::user()->name;

        if ($namabank == 'Bank Malioboro') {
            return redirect('/bankmalioboro');
        }
        if ($namabank == 'Bank Sagan') {
            return redirect('/banksagan');
        }
    }

    function bankmalioboro()
    {
        $pengantar = Auth::user()->name;
        $transaksis = DB::table('transaksis')
        ->where('nama_pengantar', $pengantar)
        ->paginate(5);
        return view('/pengantar/antarpesananmalioboro', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    function banksagan()
    {
        $pengantar = Auth::user()->name;
        $transaksis = DB::table('transaksis')
        ->where('tujuan_bank', 'Bank Sagan')
        ->where('nama_pengantar', $pengantar)
        ->paginate(5);
        return view('/pengantar/antarpesananmalioboro', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }
    public function antartransaksi($id, Request $request)
    {
        $pengantar = Auth::user()->name;
        $transaksi = Transaksis::find($id);
        $transaksi->status = "Diantarkan";
        $transaksi->save();

        $kendaraan = Kendaraan::where('pemilik_kendaraan', $pengantar)->first();
        $kendaraan->kapasitas_ditampung = $kendaraan->kapasitas_ditampung + $transaksi->berat_sampah;
        $kendaraan->save();

        
        $transaksis = DB::table('transaksis')
        ->where('tujuan_bank', 'Bank Malioboro')
        ->where('nama_pengantar', $pengantar)
        ->paginate(5);
        return view('/pengantar/antarpesananmalioboro', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }

    function downloadluaranwarlok()
    {
        $nama = Auth::user()->name;
        $transaksis = Transaksis::where('nama_pengirim', $nama)->paginate(5);
        // return dd($mhs);
        $pdf = PDF::loadView('/warlok/downloadpdfori', ['transaksi' => $transaksis]);

        return $pdf->download('table_result.pdf');

        // return view('/warlok/luaran', ['key' => 'transaksis', 'transaksi' => $transaksis]);
    }

    public function download1bulanyanglalu()
{
    $startDate = '2023-11-14';
    $endDate = '2023-12-14';
    $transaksis = Transaksis::whereBetween('tanggal_diantar', [$startDate, $endDate])->paginate(10);

    $pdf = PDF::loadView('/warlok/downloadpdfori', ['transaksi' => $transaksis]);

    return $pdf->download('onemonth.pdf');
}
public function download1tahunyanglalu()
{
    $startDate = '2022-12-14';
    $endDate = '2023-12-14';
    $transaksis = Transaksis::whereBetween('tanggal_diantar', [$startDate, $endDate])->paginate(10);

    $pdf = PDF::loadView('/warlok/downloadpdfori', ['transaksi' => $transaksis]);

    return $pdf->download('oneyear.pdf');
}
    function luaranwarlok()
    {
        $nama = Auth::user()->name;
        $transaksis = Transaksis::where('nama_pengirim', $nama)->paginate(5);

        $data = Transaksis::select('jenis_sampah', DB::raw('count(*) as total'))
                    ->groupBy('jenis_sampah')
                    ->get();

        // return dd($mhs);
        return view('/warlok/luaran', ['key' => 'transaksis', 'transaksi' => $transaksis, 'data' => $data]);
    }
    function luaranpengantar()
    {
        $pengantar = Auth::user()->name;
        $transaksis = DB::table('transaksis')
        ->where('nama_pengantar', $pengantar)
        ->paginate(5);

        $data = Transaksis::select('nama_pengantar', DB::raw('count(distinct nama_pengirim) as total_senders'))
        ->groupBy('nama_pengantar')
        ->get();
        

        // return dd($mhs);
        return view('/pengantar/luaran', ['key' => 'transaksis', 'transaksi' => $transaksis, 'data' => $data]);
    }
    function prosessampah($id, Request $request)
    {
        $bank = Bank::find($id);
        $bank2 = Bank::all();
        $pemilik = Auth::user()->name;
        return view('/pemilik/prosessampah', ['key' => 'pemilik', 'pemilik' => $pemilik, 'bank' => $bank, 'bank2' => $bank2]);
    }

    function saveeditbanksampah2($id, Request $request)
    {
        $jumlah = $request->jumlah_sampah;
        $proses = $request->proses;
        $hasil = $jumlah - $proses;
        $bank = Bank::find($id)->first();
        $bank->jumlah_sampah = $hasil;
        $bank->save();
        return redirect('/pemilikkembali');
    }

    function luaranpemilik()
    {
        $nama = Auth::user()->name;
        $langganan = Auth::user()->langganan;
        $bank = Bank::where('nama_pemilik', $nama)->first();
        $jumlahsampah = $bank->jumlah_sampah;
        $kapasitassampah = $bank->kapasitas_sampah;
        $transaksis = Transaksis::where('tujuan_bank', $langganan)->paginate(5);

        $data = Transaksis::select('nama_pengirim', 'tujuan_bank', DB::raw('count(*) as total'))
        ->groupBy('nama_pengirim', 'tujuan_bank')
        ->get();
        

        // return dd($mhs);
        return view('/pemilik/luaran', ['key' => 'transaksis', 'transaksi' => $transaksis, 'data' => $data]);
    }

}
