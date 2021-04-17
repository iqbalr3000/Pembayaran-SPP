@extends('layouts.app')

@section('navbar')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/pembayaranPetugas')}}">Pembayaran</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/historyPetugas')}}">History</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card" id="print">
                <div class="card-body">
                    <div class="form-group">
                        <p>ID Petugas : <strong>{{$pembayaran->id_petugas}}</strong></p>
                    </div>
                    <div class="form-group">
                        <p>NISN : <strong>{{$pembayaran->nisn}}</strong></p>
                    </div>
                    <div class="form-group">
                        <p>Nama : <strong>{{$pembayaran->nama}}</strong></p>
                    </div>
                    <div class="form-group">
                        <p>Tahun Bayar : <strong>{{$pembayaran->tahun_bayar}}</strong></p>
                    </div>
                    <div class="form-group">
                        <p>Bulan Bayar : <strong>{{$pembayaran->bulan_bayar}}</strong></p>
                    </div>
                    <div class="form-group">
                        <p>Jumlah Bayar : <strong>{{$pembayaran->nominal}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
         $('#print').ready(function(){
            window.print();
        });
    </script>
@endsection
