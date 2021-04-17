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

            <div class="card">
                <div class="card-body">
                    <form action="{{url('pembayaran/edit/update/'.$pembayaran->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="id_petugas">Petugas</label>
                            <input type="text" name="id_petugas" value="{{Auth::user()->id}}" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nisn">Siswa</label>
                            <select name="nisn" id="nisn" class="form-control">
                                <option value disable>Pilih Siswa</option>
                                @foreach ($siswa as $a)
                                    <option value="{{$a->nisn}}" >{{$a->nama}} ({{$a->nisn}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_bayar">Tahun Bayar</label>
                            <input type="text" name="tahun_bayar" class="form-control" value="{{$pembayaran->tahun_bayar}}" required>
                        </div>
                        <div class="form-group">
                            <label for="bulan_bayar">Bulan Bayar</label>
                            <input type="text" name="bulan_bayar" class="form-control" value="{{$pembayaran->bulan_bayar}}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_spp">ID SPP</label>
                            <input type="text" name="id_spp" class="form-control" value="{{$pembayaran->id_spp}}" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah bayar</label>
                            <input type="text" name="jumlah_bayar" class="form-control" value="{{$pembayaran->id_spp}}" required>
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    {{-- <script>
        var nisn = $('#nisn').val();
        console.log(nisn);

        function getData(){

            $.ajax({
                url: "{{url('/getdata/')}}" + "/" + nisn,
                type: "GET",
                success: function(data){

                }error: function(data){

                }
            })
        }
    </script> --}}

    <script>
        $(document).ready( function () {
            $('#nisn').select2();
        } );
    </script>
@endsection

