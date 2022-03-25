<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CobaController extends Controller
{
    public function index()
    {
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

    }
}
