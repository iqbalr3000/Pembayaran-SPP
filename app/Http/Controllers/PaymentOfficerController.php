<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\SPP;
use App\Models\Student;
use App\Models\ViewPayment;
use App\Models\ViewStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentOfficerController extends Controller
{
    public function index()
    {
        $pembayaran = ViewPayment::all()->sortByDesc('created_at');

        return view('petugas.pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Student::all();
        return view('petugas.pembayaran.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $siswa = ViewStudent::where('nisn', $request->nisn)->first();
        // dd($siswa);

        $pembayaran = Payment::where('nisn', $request->nisn)->get();
        // dd($pembayaran);

        $spp = SPP::where('id', $siswa->id_spp)->first();
        // dd($spp);

        $month = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        if(sizeof($pembayaran) == 0){
            $index = 6;
            $tahun = substr($spp->tahun , 0 , 4);
        }else{
            $akhir = array_key_last(end($pembayaran));
            $akhir = $pembayaran[$akhir];

            $a = array_search($akhir->bulan_bayar, $month);
            // dd($a);
            $tahun = substr($spp->tahun , 0 , 4);

            if($a == 11){
                $index = 0;
                $tahun + 1;
            }else{
                $index = $a + 1;
                // dd($index);
                $tahun = $akhir->tahun_bayar;
            }
        }

        if($request->jumlah_bayar < $spp->nominal){
            return redirect('/pembayaranPetugas/create')->with('success', 'Uang anda kurang');
        }

        Payment::create([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tanggal_bayar' => Carbon::now(),
            'bulan_bayar' => $month[$index],
            'tahun_bayar' => $tahun,
            'id_spp' => $siswa->id_spp,
            'jumlah_bayar' => $spp->nominal,
        ]);

        $kembalian = $request->jumlah_bayar - $spp->nominal;
        return redirect('/pembayaranPetugas')->with('success', 'pembayaran berhasil, kembalian anda Rp.'.$kembalian);
    }

    public function edit($id)
    {
        $siswa = Student::all();
        $pembayaran = Payment::find($id);

        return view('petugas.pembayaran.edit', compact('pembayaran', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        Payment::find($id)->update([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tanggal_bayar' => Carbon::now(),
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect('/pembayaranPetugas');
    }

    public function delete($id)
    {
        Payment::find($id)->delete();
        
        return redirect('/pembayaranPetugas');
    }

    public function show($id)
    {
        $pembayaran = ViewPayment::find($id);
        return view('petugas.pembayaran.show', compact('pembayaran'));
    }

    public function getData($nisn)
    {
        $siswa = ViewStudent::where('nisn', $nisn)->first();
        $spp = SPP::where('id', $siswa->id_spp)->first();

        $pembayaran = ViewPayment::where('nisn', $nisn)->latest()->first();
        $a = array_key_last(end($pembayaran));

        $data = [
            'siswa' => $pembayaran,
            'spp' => $spp,
            'status' => 'sukses',
        ];

        return response()->json($data);
    }
}
