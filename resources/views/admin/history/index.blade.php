@extends('layouts.app')

@section('navbar')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/petugas')}}">Petugas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/spp')}}">SPP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/rombel')}}">Rombel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/siswa')}}">Siswa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/pembayaran')}}">Pembayaran</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/history')}}">History</a>
        </li>
        
    </ul>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">

            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{url('/history/export')}}" class="btn btn-block btn-success">Export Laporan</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table" id="tablePayment">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Petugas</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Rombel</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Bayar</th>
                                <th>Tahun Bayar</th>
                                <th>ID SPP</th>
                                <th>Jumlah Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->id_petugas}}</td>
                                <td>{{$a->nisn}}</td>
                                <td>{{$a->nama}}</td>
                                <td>{{$a->nama_kelas}}</td>
                                <td>{{$a->tanggal_bayar}}</td>
                                <td>{{$a->bulan_bayar}}</td>
                                <td>{{$a->tahun_bayar}}</td>
                                <td>{{$a->id_spp}}</td>
                                <td>{{$a->nominal}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#tablePayment').DataTable();
        } );
    </script>
@endsection