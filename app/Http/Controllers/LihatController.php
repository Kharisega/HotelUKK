<?php

namespace App\Http\Controllers;

use App\Fhotel;
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
        return view('fasilitas.superior');
    }

    public function deluxe()
    {
        return view('fasilitas.deluxe');
    }
}
