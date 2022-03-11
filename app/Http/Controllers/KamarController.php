<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nama_kamar'=>'required',
            'keterangan'=>'required',
            'status'=>'required',
        ]);
        Kamar::create($request->all());
        return redirect()->route('kamar.index')->with('success', "Data Kamar Berhasil ditambahkan");
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
            'nama_kamar'=>'required',
            'keterangan'=>'required',
            'status'=>'required',
        ]);
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
