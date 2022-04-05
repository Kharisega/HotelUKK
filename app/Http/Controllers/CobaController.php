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

        $superior = count($super);
        
        $delux = DB::table('reservasi')
        ->where('tipe_kamar', 'deluxe')
        ->get();
        $deluxe = count($delux);

        $jml_super = $superiorawal;
        for ($i=0; $i < count($super); $i++) { 
            $jml_super = $jml_super - $super[$i]->jumlah_kamar;
        }

        $jml_delux = $deluxeawal;
        for ($i=0; $i < count($delux); $i++) { 
            $jml_delux = $jml_delux - $delux[$i]->jumlah_kamar;
        }

        $admin = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.role_id', 1)
            ->select('users.name', 'users.email', 'model_has_roles.model_id')
            ->count();

        $resepsionis = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.role_id', 2)
            ->select('users.name', 'users.email', 'model_has_roles.model_id')
            ->count();
        
        $tamu = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.role_id', 3)
            ->select('users.name', 'users.email', 'model_has_roles.model_id')
            ->count();

        $pesanan = DB::table('reservasi')->count();

        return view('layouts.dash', compact('admin', 'resepsionis', 'tamu', 'superiorawal', 'deluxeawal', 'jml_super', 'jml_delux', 'pesanan'));

    }
}
