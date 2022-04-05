<?php

namespace App\Http\Controllers;

use App\Reservasi;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function cari2()
    {
        $reservasi = Reservasi::paginate(10);
        return view('reservasi.index2', compact('reservasi'));
    }
    public function cari3(Request $request)
    {
        if ( isset($request->nama_tamu) && isset($request->tgl_checkin) ) {
            $nama_tamu = $request->nama_tamu;
            // dd($nama_tamu);

            $reservasi = DB::table('reservasi')
            ->where('tgl_checkin', $request->tgl_checkin)
            ->where('nama_tamu', $nama_tamu)
            ->orWhere('nama_pemesan', $nama_tamu)
            ->paginate(10);
        
            return view('reservasi.index2', compact('reservasi'));

        } elseif (isset($request->tgl_checkin) && is_null($request->nama_tamu)) {

            $reservasi = DB::table('reservasi')
            ->where('tgl_checkin', $request->tgl_checkin)
            ->paginate(10);
        
            return view('reservasi.index2', compact('reservasi'));

        } elseif ( isset($request->nama_tamu) && is_null($request->tgl_checkin) ) {

            $reservasi = DB::table('reservasi')
            ->where('nama_tamu', $request->nama_tamu)
            ->orWhere('nama_pemesan', $request->nama_tamu)
            ->paginate(10);

            return view('reservasi.index2', compact('reservasi'));

        } else {
            Alert::toast('Mohon isi kolom nama atau tanggal untuk mencari data!', 'error');
            return redirect()->route('reservasi.index2');
        }
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
