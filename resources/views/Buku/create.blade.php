@extends('templates.app')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}};

<form action="{{ route('data_buku.tambah.proses')}}" class="card p-5" method="post" enctype="multipart/form-data">
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
        <label for="name" class="col-sm-2 col-form-label">Judul Buku: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori Buku: </label>
        <div class="col-sm-10">
            <select class="form-select" name="kategori" id="kategori" value="{{ old('kategori') }}">
                <option selected disabled hidden>Pilih</option>
                <option value="Novel">Novel</option>
                <option value="Komik">Komik</option>
                <option value="Buku Pelajaran">Buku Pelajaran</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="image" class="col-sm-2 col-form-label">Cover Buku: </label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Penulis: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Jumlah Buku: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah" name="jumlah_buku" value="{{ old('jumlah_buku') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection