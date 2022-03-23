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
        $kamar = Fkamar::where('tipe_kamar', 'superior');
        return view('fasilitas.superior', compact('kamar'));
    }

    public function deluxe()
    {
        $kamar = Fkamar::where('tipe_kamar', 'deluxe');
        return view('fasilitas.deluxe', compact('kamar'));
    }
}
