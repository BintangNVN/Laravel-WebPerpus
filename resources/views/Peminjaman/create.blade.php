@extends('templates.app')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}};

<form action="{{ route('peminjaman_buku.tambah.proses')}}" class="card p-5" method="post">
    @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Peminjam: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email: </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Judul Buku: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Tanggal Peminjaman: </label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
