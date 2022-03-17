<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.role_id', 1)
            ->select('users.name', 'users.email', 'model_has_roles.model_id')
            ->paginate(5);
        // dd($admin);
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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

        $user->assignRole('admin')->get();
        return redirect()->route('admin.index')->with('success', "Akun Administrator Berhasil ditambahkan");
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
        $admin = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', $akun)
            ->select('users.name', 'users.email', 'model_has_roles.model_id')
            ->get();
        
        // dd($admin);
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        
            return redirect()->route('admin.index')->with('success', "Data Administrator berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        $hapus1 = DB::table('users')->where('id', $admin)->delete();
        $hapus2 = DB::table('model_has_roles')->where('model_id', $admin)->delete();

        return redirect()->route('admin.index')->with('success', 'Data Administrator berhasil dihapus');
    }
}
