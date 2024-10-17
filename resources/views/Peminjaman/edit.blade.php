@extends('templates.app')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('peminjaman_buku.ubah.proses', $pinjams['id'])}}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Pengguna: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $pinjams['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email: </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ $pinjams['email'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul Buku: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $pinjams['judul'] }}">
        </div>
    </div>
    
    
    
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
