<?php

namespace App\Http\Controllers;

use App\Reservasi;
use DB;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    
    public function cari(Request $request)
    {
        $reservasi = DB::table('reservasi')
            ->where('nama_tamu', $request->nama_tamu)
            ->orWhere('nama_pemesan', $request->nama_tamu)
            ->paginate(10);

        return view('reservasi.index', compact('reservasi'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::paginate(10);
        return view('reservasi.index', compact('reservasi'));
    }

    
    public function filter(Request $request)
    {
        $reservasi = DB::table('reservasi')
            ->where('tgl_checkin', $request->tgl_checkin)
            ->paginate(10);
        
        return view('reservasi.index', compact('reservasi'));
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('success', 'Pesanan sudah berhasil Check-Out!');
    }
}
