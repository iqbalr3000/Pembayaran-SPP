<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\SPP;
use App\Models\Student;
use App\Models\User;
use App\Models\ViewStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $siswa = ViewStudent::all();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $rombel = Rombel::all();
        $spp = SPP::all();

        return view('admin.siswa.create', compact('rombel', 'spp'));
    }

    public function store(Request $request)
    {
        Student::create([
            'kode' => $request->nisn,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_rombel' => $request->id_rombel,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        $email = $request->nisn."@gmail.com";

        User::create([
            'kode' => $request->nisn,
            'name' => $request->nama,
            'email'=> $email,
            'password' => bcrypt($request->nisn),
            'role' => 'siswa',
        ]);

        return redirect('/siswa');
    }

    public function edit($kode)
    {
        $rombel = Rombel::all();
        $spp = SPP::all();
        $siswa = Student::where('kode','=', $kode)->first();

        return view('admin.siswa.edit', compact('siswa', 'rombel', 'spp'));
    }

    public function update(Request $request, $kode)
    {
        Student::where('kode', $kode)->update([
            'kode' => $request->nisn,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_rombel' => $request->id_rombel,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        $email = $request->nisn."@gmail.com";

        User::where('kode', $kode)->update([
            'kode' => $request->nisn,
            'name' => $request->nama,
            'email'=> $email,
            'password' => bcrypt($request->nisn),
            'role' => 'siswa',
        ]);

        return redirect('/siswa');
    }

    public function delete($kode)
    {
        Student::where('kode', $kode)->delete();
        User::where('kode', $kode)->delete();

        return redirect('/siswa');
    }
}
