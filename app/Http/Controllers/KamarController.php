<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::latest()->paginate(5);
        return view('kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar'=>'required',
            'jumlah_kamar'=>'required',
        ]);

        $tipekamar = $request->tipe_kamar;

        if ($tipekamar == 'Superior') {

            $id = 1;
            $jumlahawal = DB::table('kamar')->where('tipe_kamar', 'Superior')->value('jumlah_kamar');
            $jumlahakhir = $jumlahawal + $request->jumlah_kamar;

        } else {
            
            $id = 2;
            $jumlahawal = DB::table('kamar')->where('tipe_kamar', 'Deluxe')->value('jumlah_kamar');
            $jumlahakhir = $jumlahawal + $request->jumlah_kamar;
            
        }
        

        $update = DB::table('kamar')
        ->where('id_kamar', $id)
        ->update([
            'tipe_kamar' => $request['tipe_kamar'],
            'jumlah_kamar' => $jumlahakhir,
        ]);

        return redirect()->route('kamar.index')->with('success', "Jumlah Kamar Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        return view('kamar.index', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        // dd($kamar);
        // $kamarr = DB::table('kamar')->where('id_kamar', $kamar)->get();
        // dd($kamarr);
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        // dd($request);
        $request->validate([
            'tipe_kamar'=>'required',
            'jumlah_kamar'=>'required',
            // 'gambar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        if ($request->gambar != '') {
            $namegambar = $request->file('gambar');
            $gambar = $request->file('gambar')->getClientOriginalName();
    
            $thumbgambar = Image::make($namegambar->getRealPath())->resize(85, 85);
            $thumbPath = public_path() . '/fasilitas_hotel/' . $gambar;
            $thumbgambar = Image::make($thumbgambar)->save($thumbPath);

            $kamar->update([
                'tipe_kamar'=>$request['tipe_kamar'],
                'jumlah_kamar'=>$request['jumlah_kamar'],
                'gambar'=>$gambar,
            ]);
            return redirect()->route('kamar.index')->with('success', "Data Kamar berhasil diubah");
        }

        $kamar->update($request->all());
        return redirect()->route('kamar.index')->with('success', "Data Kamar berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Data Kamar berhasil dihapus');
    }
}
