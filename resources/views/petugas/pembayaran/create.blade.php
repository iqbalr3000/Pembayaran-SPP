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

            <div id="alert">
                @if ($message = Session::get('success'))
                    <div class="alert alert-danger alert-block">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{url('pembayaran/create/store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="id_petugas">Petugas</label>
                            <input type="text" name="id_petugas" value="{{Auth::user()->id}}" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nisn">Siswa</label>
                            <select name="nisn" id="nisn" class="form-control" onchange="dataSiswa()">
                                <option value disable>Pilih Siswa</option>
                                @foreach ($siswa as $a)
                                    <option value="{{$a->nisn}}">{{$a->nama}} ({{$a->nisn}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Terakhir Bayar</label>
                            <input type="text" id="terakhiar_bayar" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah bayar</label>
                            <input type="text" name="jumlah_bayar" class="form-control" required>
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
        function getData(){
            var nisn = $('#nisn').val();
            console.log(nisn);

            $.ajax({
                url: "{{url('/get-data/')}}" + "/" + nisn,
                type: "GET",
                success: function(data){
                    $(#terakhir_bayar).val(data[siswa][bulan_bayar] + data[siswa][tahun_bayar]);
                    $(#nominal).val(data[siswa][nominal]);
                };
            });
        };
    </script> --}}

    <script>
        $(document).ready( function () {
            $('#nisn').select2();
        } );
    </script>

    <script>
        setTimeout(function(){
            document.getElementById('alert').innerHTML="";
        },3000);
    </script>

    <script>
        function dataSiswa(){
            var nisn = $('#nisn').val();
            console.log(nisn);

            $.ajax({
                url: "{{url('/get-data/')}}" + "/" + nisn,
                type: "GET",
                success: function(data){
                    console.log(data);
                    $('#terakhir_bayar').val(data[siswa][bulan_bayar] + " / " + data[siswa][tahun_bayar]);
                    $('#nominal').val(data[siswa][nominal]);
                }
            })
        }
    </script>
@endsection

