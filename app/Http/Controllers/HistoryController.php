<?php

namespace App\Http\Controllers;

use App\Exports\PaymentExport;
use App\Models\ViewPayment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class HistoryController extends Controller
{
    public function index()
    {
        $pembayaran = ViewPayment::all()->sortByDesc('created_at');

        return view('admin.history.index', compact('pembayaran'));
    }

    public function export()
    {
        return Excel::download(new PaymentExport, 'Payment.xlsx');
    }
}
