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
        <li class="nav-item active">
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
                    <form action="{{url('siswa/edit/update/'.$siswa->kode)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" class="form-control" value="{{$siswa->nisn}}" required>
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" class="form-control" value="{{$siswa->nis}}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$siswa->nama}}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_rombel">Rombel</label>
                            <select name="id_rombel" class="form-control" required>
                                <option value disable>Pilih Rombel</option>
                                @foreach ($rombel as $a)
                                    <option value="{{$a->id}}" @if ($a->id == $siswa->id_rombel) selected @endif>{{$a->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{$siswa->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">NO Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{$siswa->no_telp}}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_spp">SPP</label>
                            <select name="id_spp" class="form-control" required>
                                <option value disable>Pilih SPP</option>
                                @foreach ($spp as $a)
                                    <option value="{{$a->id}}" @if ($a->id == $siswa->id_spp) selected @endif>{{$a->nama_spp}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
