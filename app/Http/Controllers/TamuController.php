<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;

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
            'tgl_checkin'=>'required',
            'tgl_checkout'=>'required',
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



    }
}
