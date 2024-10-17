@extends('templates.app')

@section('content-dinamis')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku Perpustakaan</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background:#1a73e8;
    color: #ffffff;
    padding: 20px 0;
    text-align: center;
    display: flex;
}

header h1 {
    float: left;
    font-size: 28px;
    margin-left: 20px;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: #ffffff;
    text-decoration: none;
}

main {
    padding: 20px;
}

.book-list {
    list-style: none;
    padding: 0;
}

.book-list li {
    background: #ffffff;
    margin: 10px 0;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

form {
    background: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

form label {
    display: block;
    margin: 10px 0 5px;
}

form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    background: #35424a;
    color: #ffffff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background: #456172;
}

footer {
    text-align: center;
    padding: 10px 0;
    background: #35424a;
    color: #ffffff;
}

/* Media query untuk layar HP (max-width: 768px) */
@media only screen and (max-width: 768px) {
    header {
        flex-direction: column;
        align-items: center;
    }

    header h1 {
        font-size: 22px; /* Kurangi ukuran font untuk header */
        margin-left: 0; /* Hilangkan margin kiri agar lebih pas di tengah */
        text-align: center;
    }

    nav ul {
        padding: 0;
        text-align: center;
    }

    nav ul li {
        display: block; /* Ubah dari inline menjadi block untuk tampilan vertikal */
        margin: 10px 0; /* Tambahkan jarak antar item menu */
    }

    main {
        padding: 10px; /* Kurangi padding untuk tampilan yang lebih pas di layar kecil */
    }

    .book-list li {
        font-size: 14px; /* Kurangi ukuran font pada daftar buku */
        padding: 10px; /* Sesuaikan padding */
    }

    form {
        padding: 15px; /* Sesuaikan padding form agar lebih pas di layar kecil */
    }

    form label {
        font-size: 14px; /* Perkecil ukuran font pada label */
    }

    form input {
        padding: 8px; /* Sesuaikan padding input */
        font-size: 14px; /* Perkecil ukuran font input */
    }

    form button {
        padding: 10px; /* Sesuaikan ukuran tombol */
        font-size: 16px; /* Sesuaikan ukuran font tombol */
    }

    .mb-3.row {
        display: flex;
        flex-direction: column; /* Ubah tata letak dari horizontal ke vertikal */
    }

    .col-sm-2 {
        width: 100%; /* Buat lebar label 100% */
        margin-bottom: 5px; /* Tambahkan sedikit jarak di bawah label */
    }

    .col-sm-10 {
        width: 100%; /* Buat lebar input 100% */
    }
}

    </style>
</head>
<body>
    
    <main>
        {{-- <section id="daftar-buku">
            <h2>Daftar Buku Tersedia</h2>
            <ul class="book-list">
                @foreach ($books as $book)
                    <li>{{ $book->title }}</li> <!-- Menampilkan judul buku -->
                @endforeach
            </ul>
        </section> --}}

        <section id="form-peminjaman">
            <h2>Form Peminjaman Buku</h2>
            <form action="{{route('peminjaman_buku.tambah.proses')}}" method="post">
                @csrf <!-- Menambahkan token CSRF -->

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
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Tanggal Peminjaman: </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                    </div>
                </div>
                
                <button type="submit">Pinjam Buku</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Perpustakaan Bintang. Semua Hak Dilindungi.</p>
    </footer>
@endsection
</body>
</html>
