<?php

namespace App\Http\Controllers;

use App\Fhotel;
use App\Fkamar;
use Illuminate\Http\Request;

class LihatController extends Controller
{
    public function hotel()
    {
        $hotel = Fhotel::all();
        return view('fasilitas.hotel', compact('hotel'));
    }

    public function superior()
    {
        $kamar = Fkamar::where('tipe_kamar', 'Superior')->get();
        // dd($kamar);
        return view('fasilitas.superior', compact('kamar'));
    }

    public function deluxe()
    {
        $kamar = Fkamar::where('tipe_kamar', 'Deluxe')->get();
        return view('fasilitas.deluxe', compact('kamar'));
    }
}
