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
        <li class="nav-item active">
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
        <li class="nav-item">
            <a class="nav-link" href="{{url('/history')}}">History</a>
        </li>
        
    </ul>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <form action="{{url('spp/edit/update/'.$spp->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nama_spp">Nama SPP</label>
                            <input type="text" name="nama_spp" class="form-control" value="{{$spp->nama_spp}}" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" class="form-control" value="{{$spp->tahun}}" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" class="form-control" value="{{$spp->nominal}}" required>
                        </div>

                        <button class="btn btn-primary">Edit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
