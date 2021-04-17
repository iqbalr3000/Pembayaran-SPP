<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\ViewPayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ViewPayment::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'id_petugas',
            'nisn',
            'nama',
            'id_rombel',
            'nama_kelas',
            'kompetensi_keahlian',
            'alamat',
            'no_telp',
            'tanggal_bayar',
            'bulan_bayar',
            'tahun_bayar',
            'id_spp',
            'nama_spp',
            'tahun',
            'nominal',
            'created_at',
  
        ];
    }
}
