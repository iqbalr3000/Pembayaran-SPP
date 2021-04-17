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

            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{url('/spp/create')}}" class="btn btn-block btn-primary">Buat</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table" id="tableSPP">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama SPP</th>
                                <th>Tahun</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spp as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->nama_spp}}</td>
                                <td>{{$a->tahun}}</td>
                                <td>{{$a->nominal}}</td>
                                <td>
                                    <form action="{{url('/spp/delete/'.$a->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{url('/spp/edit/'.$a->id)}}" class="btn btn-warning">Edit</a>

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
            $('#tableSPP').DataTable();
        } );
    </script>
@endsection