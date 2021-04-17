<?php

namespace App\Http\Controllers;

use App\Models\ViewPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryStudentController extends Controller
{
    public function index()
    {
        $pembayaran = ViewPayment::where('nisn', Auth::user()->kode)->get();

        return view('siswa.history.index', compact('pembayaran'));
    }
}
