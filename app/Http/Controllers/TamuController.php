<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
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
        return view('tamu.reservasi', compact('request'));
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
}
