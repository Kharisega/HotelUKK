<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use DB;
// use Alert;
use RealRashid\SweetAlert\Facades\Alert;

class TamuController extends Controller
{
    public function index()
    {
        return view('tamu');
    }

    public function pesan(Request $request)
    {
        // dd($request);
        $request->validate([
            'tgl_checkin'=>'required|date|after_or_equal:today',
            'tgl_checkout'=>'required|date|after:tgl_checkin',
            'jumlah_kamar'=>'required',
        ]);

        $superiorawal = DB::table('kamar')
        ->where('tipe_kamar', 'Superior')
        ->value('jumlah_kamar');

        $deluxeawal = DB::table('kamar')
        ->where('tipe_kamar', 'Deluxe')
        ->value('jumlah_kamar');

        $super = DB::table('reservasi')
        ->where('tipe_kamar', 'superior')
        ->get();

        $delux = DB::table('reservasi')
        ->where('tipe_kamar', 'deluxe')
        ->get();

        $jml_super = $superiorawal;
        for ($i=0; $i < count($super); $i++) { 
            $jml_super = $jml_super - $super[$i]->jumlah_kamar;
        }

        $jml_delux = $deluxeawal;
        for ($i=0; $i < count($delux); $i++) { 
            $jml_delux = $jml_delux - $delux[$i]->jumlah_kamar;
        }

        return view('tamu.reservasi', compact('request', 'jml_super', 'jml_delux'));
    }

    public function reservasi(Request $request)
    {
        // dd($request);
        $request->validate([
            'tgl_checkin'=>'required',
            'tgl_checkout'=>'required',
            'jumlah_kamar'=>'required',
            'pemesan'=>'required',
            'email'=>'required',
            'notelp'=>'required',
            'tamu'=>'required',
            'tipe_kamar'=>'required',
        ]);
        
        Reservasi::create([
            'tgl_checkin'=> $request->tgl_checkin,
            'tgl_checkout'=> $request->tgl_checkout,
            'jumlah_kamar'=> $request->jumlah_kamar,
            'nama_pemesan'=> $request->pemesan,
            'nama_tamu'=> $request->tamu,
            'tipe_kamar'=> $request->tipe_kamar,
            'notelp_tamu'=> $request->notelp,
            'email'=> $request->email,
        ]);

        // Alert::success('Sukses', 'Pemesanan Kamar anda sudah berhasil diproses!');
        Alert::toast('Pemesanan kamar sudah berhasil!', 'success');
        return redirect()->route('tamu');
    }

    public function pesanan()
    {
        // dd(auth()->user()->email);
        $pesanan = DB::table('reservasi')
        ->where('email', auth()->user()->email)
        ->paginate(5);
        // dd($pesanan);
        return view('tamu.pesanan', compact('pesanan'));
    }

    public function cetak(Request $request)
    {
        $cetak = DB::table('reservasi')
        ->where('id_reservasi', $request->id_reservasi)
        ->get();
        // dd($cetak);
        return view('tamu.cetak', compact('cetak'));
    }
}
