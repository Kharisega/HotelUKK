<?php

namespace App\Http\Controllers;

use App\Reservasi;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::paginate(10);
        return view('reservasi.index', compact('reservasi'));
    }
    public function indexin()
    {
        $reservasi = Reservasi::where('status', 'checkin')->paginate(10);
        return view('reservasi.index', compact('reservasi'));
    }
    public function indexout()
    {
        $reservasi = Reservasi::where('status', 'checkout')->paginate(10);
        return view('reservasi.index', compact('reservasi'));
    }
    public function indexbatal()
    {
        $reservasi = Reservasi::where('status', 'batal')->paginate(10);
        return view('reservasi.index', compact('reservasi'));
    }

    public function cari(Request $request)
    {
        if ( isset($request->nama_tamu) && isset($request->tgl_checkin) ) {
            $nama_tamu = $request->nama_tamu;
            // dd($nama_tamu);

            $reservasi = DB::table('reservasi')
            ->where('tgl_checkin', $request->tgl_checkin)
            ->where('nama_tamu', $nama_tamu)
            ->orWhere('nama_pemesan', $nama_tamu)
            ->paginate(10);
        
            return view('reservasi.index', compact('reservasi'));

        } elseif (isset($request->tgl_checkin) && is_null($request->nama_tamu)) {

            $reservasi = DB::table('reservasi')
            ->where('tgl_checkin', $request->tgl_checkin)
            ->paginate(10);
        
            return view('reservasi.index', compact('reservasi'));

        } elseif ( isset($request->nama_tamu) && is_null($request->tgl_checkin) ) {

            $reservasi = DB::table('reservasi')
            ->where('nama_tamu', $request->nama_tamu)
            ->orWhere('nama_pemesan', $request->nama_tamu)
            ->paginate(10);

            return view('reservasi.index', compact('reservasi'));

        } else {
            Alert::toast('Mohon isi kolom nama atau tanggal untuk mencari data!', 'error');
            return redirect()->route('reservasi.index');
        }
    }

    public function checkin($id_reservasi)
    {
        $ganti = DB::table('reservasi')->where('id_reservasi', $id_reservasi)->update([ 'status' => 'checkout' ]);
        return redirect()->route('reservasi.indexin')->with('success', 'Pesanan sudah berhasil Check-In!');
    }

    public function checkout($id_reservasi)
    {
        $ganti = DB::table('reservasi')->where('id_reservasi', $id_reservasi)->update([ 'status' => 'selesai' ]);
        return redirect()->route('reservasi.indexout')->with('success', 'Pesanan sudah berhasil Check-Out!');
    }

    public function destroy($reservasi)
    {
        $ganti = DB::table('reservasi')->where('id_reservasi', $id_reservasi)->update([ 'status' => 'batal' ]);
        return redirect()->route('reservasi.indexbatal')->with('success', 'Pesanan sudah berhasil dibatalkan!');
    }
}
