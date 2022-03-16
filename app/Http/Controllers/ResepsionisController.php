<?php

namespace App\Http\Controllers;

use App\Akun;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resepsionis = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.role_id', 2)
            ->select('users.name', 'users.email', 'model_has_roles.model_id')
            ->paginate(5);
        // dd($resepsionis);
        return view('resepsionis.index', compact('resepsionis'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resepsionis.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole('resepsionis')->get();
        return redirect()->route('resepsionis.index')->with('success', "Akun Resepsionis Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit($akun)
    {
        $resepsionis = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', $akun)
            ->get();
        
        // dd($admin);
        return view('resepsionis.edit', compact('resepsionis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akun $akun)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8'],
        ]);
        // dd($request);
        $update = DB::table('users')
            ->where('id', $request['model_id'])
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                // 'password' => Hash::make($request['password']),
            ]);
        
            return redirect()->route('resepsionis.index')->with('success', "Data Resepsionis berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy($akun)
    {
        $hapus1 = DB::table('users')->where('id', $akun)->delete();
        $hapus2 = DB::table('model_has_roles')->where('model_id', $akun)->delete();

        return redirect()->route('resepsionis.index')->with('success', 'Data Resepsionis berhasil dihapus');
    }
}
