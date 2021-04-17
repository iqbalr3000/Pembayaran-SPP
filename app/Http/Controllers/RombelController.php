<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function index()
    {
        $rombel = Rombel::all();

        return view('admin.rombel.index', compact('rombel'));
    }

    public function create()
    {
        return view('admin.rombel.create');
    }

    public function store(Request $request)
    {
        Rombel::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect('/rombel');
    }

    public function edit($id)
    {
        $rombel = Rombel::find($id);

        return view('admin.rombel.edit', compact('rombel'));
    }

    public function update(Request $request, $id)
    {
        Rombel::find($id)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect('/rombel');
    }

    public function delete($id)
    {
        Rombel::find($id)->delete();
        
        return redirect('/rombel');
    }
}
