<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $petugas = Officer::all();

        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        Officer::create([
            'kode' => $request->kode,
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        User::create([
            'kode' => $request->kode,
            'name' => $request->nama_petugas,
            'email'=> $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->level,
        ]);

        return redirect('/petugas');
    }

    public function edit($kode)
    {
        $petugas = Officer::where('kode','=', $kode)->first();

        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $kode)
    {
        Officer::where('kode','=', $kode)->update([
            'kode' => $request->kode,
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        $email = $request->nisn."@gmail.com";

        User::where('kode','=', $kode)->update([
            'kode' => $request->kode,
            'name' => $request->nama_petugas,
            'email'=> $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->level,
        ]);

        return redirect('/petugas');
    }

    public function delete($kode)
    {
        Officer::where('kode','=', $kode)->delete();
        User::where('kode','=', $kode)->delete();

        return redirect('/petugas');
    }
}
