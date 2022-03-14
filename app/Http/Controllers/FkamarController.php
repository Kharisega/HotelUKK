<?php

namespace App\Http\Controllers;

use App\Fkamar;
use Illuminate\Http\Request;

class FkamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fkamar = Fkamar::latest()->paginate(5);
        return view('fkamar.index', compact('fkamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fkamar.create');
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
        ]);
        Fkamar::create($request->all());
        return redirect()->route('fkamar.index')->with('success', "Data Fasilitas Kamar Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fkamar  $fkamar
     * @return \Illuminate\Http\Response
     */
    public function show(Fkamar $fkamar)
    {
        return view('fkamar.index', compact('fkamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fkamar  $fkamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Fkamar $fkamar)
    {
        // dd($fasilitaskmr);
        // $fasilitaskmrr = DB::table('fasilitaskmr')->where('id_fasilitaskmr', $fasilitaskmr)->get();
        // dd($fasilitaskmrr);
        return view('fkamar.edit', compact('fkamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fkamar  $fkamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fkamar $fkamar)
    {
        // dd($request);
        $request->validate([
            'nama_fasilitas'=>'required',
        ]);
        $fkamar->update($request->all());
        return redirect()->route('fkamar.index')->with('success', "Data Fasilitas Kamar berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fkamar  $fkamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fkamar $fkamar)
    {
        $fkamar->delete();
        return redirect()->route('fkamar.index')->with('success', 'Data Fasilitas Kamar berhasil dihapus');
    }
}
