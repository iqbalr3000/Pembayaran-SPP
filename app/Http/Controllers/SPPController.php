<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    public function index()
    {
        $spp = SPP::all();

        return view('admin.spp.index', compact('spp'));
    }

    public function create()
    {
        return view('admin.spp.create');
    }

    public function store(Request $request)
    {
        SPP::create([
            'nama_spp' => $request->nama_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect('/spp');
    }

    public function edit($id)
    {
        $spp = SPP::find($id);

        return view('admin.spp.edit', compact('spp'));
    }

    public function update(Request $request, $id)
    {
        SPP::find($id)->update([
            'nama_spp' => $request->nama_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect('/spp');
    }

    public function delete($id)
    {
        SPP::find($id)->delete();
        
        return redirect('/spp');
    }
}
