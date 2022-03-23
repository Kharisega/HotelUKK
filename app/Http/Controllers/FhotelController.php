<?php

namespace App\Http\Controllers;

use App\Fhotel;
use Illuminate\Http\Request;
use Image;

class FhotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fhotel = Fhotel::latest()->paginate(5);
        return view('fhotel.index', compact('fhotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fhotel.create');
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
            'nama_fasilitas'=>'required',
            // 'gambar'=>'required',
            'gambar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'keterangan'=>'required',
        ]);
        
        $namegambar = $request->file('gambar');
        $gambar = $request->file('gambar')->getClientOriginalName();

        $thumbgambar = Image::make($namegambar->getRealPath())->resize(85, 85);
        $thumbPath = public_path() . '/fasilitas_hotelkcl/' . $gambar;
        $thumbgambar = Image::make($thumbgambar)->save($thumbPath);

        $oriGambar = Image::make($namegambar->getRealPath());
        $oriPath = public_path() . '/fasilitas_hotel/' . $gambar;
        $oriImage = Image::make($oriGambar)->save($oriPath);

        Fhotel::create([
            'nama_fasilitas' => $request['nama_fasilitas'],
            'gambar' => $gambar,
            'keterangan' => $request['keterangan'],
        ]);    

        return redirect()->route('fhotel.index')->with('success', "Data Fasilitas Hotel Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fhotel  $fhotel
     * @return \Illuminate\Http\Response
     */
    public function show(Fhotel $fhotel)
    {
        return view('fhotel.index', compact('fhotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fhotel  $fhotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fhotel $fhotel)
    {
        // dd($fasilitaskmr);
        // $fasilitaskmrr = DB::table('fasilitaskmr')->where('id_fasilitaskmr', $fasilitaskmr)->get();
        // dd($fasilitaskmrr);
        return view('fhotel.edit', compact('fhotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fhotel  $fhotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fhotel $fhotel)
    {
        // dd($request);
        $request->validate([
            'nama_fasilitas'=>'required',
            'keterangan'=>'required',
        ]);
        $fhotel->update($request->all());
        return redirect()->route('fhotel.index')->with('success', "Data Fasilitas Hotel berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fhotel  $fhotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fhotel $fhotel)
    {
        $fhotel->delete();
        return redirect()->route('fhotel.index')->with('success', 'Data Fasilitas Hotel berhasil dihapus');
    }
}
