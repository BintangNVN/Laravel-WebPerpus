@extends('templates.app')


@section('content-dinamis')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('data_buku.ubah.proses', $bukus['id'])}}" method="POST" class="card p-5" enctype="multipart/form-data">
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
        <label for="name" class="col-sm-2 col-form-label">Judul Buku: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $bukus['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Kategori Buku: </label>
        <div class="col-sm-10">
            <select class="form-select" name="kategori" id="kategori">
                <option selected disabled hidden>Pilih</option>
                <option value="Novel" {{ $bukus['kategori'] == "Novel" ? 'selected' : '' }}>Novel</option>
                <option value="Komik" {{ $bukus['kategori'] == "Komik" ? 'selected' : '' }}>Komik</option>
                <option value="Buku Pelajaran" {{ $bukus['kategori'] == "Buku Pelajaran" ? 'selected' : '' }}>Buku Pelajaran</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Gambar Buku: </label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="image" name="image" value="{{ $bukus['image'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Penulis: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $bukus['penulis'] }}">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
