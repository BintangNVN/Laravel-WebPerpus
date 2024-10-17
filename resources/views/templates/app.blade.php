<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Bintang</title>
    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- asset : memanggil file yg ada di folder public biasanya untuk css,js atau gambar/file tambahan --}}
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    
    {{-- @stack('style') --}}
    <style>
        header {
            background-color: #1a73e8; /* Warna biru tua */
            color: #fff;
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container {
            max-width: 90%; /* Lebih fleksibel pada layar kecil */
            margin: 0 auto;
        }

        header h1 {
            font-size: 24px; /* Perkecil ukuran untuk mobile */
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex; /* Agar semua elemen li tersusun secara horizontal */
            justify-content: space-around; /* Mengatur jarak antar elemen li */
        }

        nav ul li {
            padding: 10px 20px; /* Padding yang seragam untuk setiap item */
        }

        nav ul li a {
            text-decoration: none;
            color: white; /* Warna teks putih agar sesuai dengan tema header */
        }

        nav ul li a:hover {
            color: #244f34; /* Warna saat link di-hover */
        }

        nav ul li.active a {
            font-weight: bold; /* Tambahkan gaya berbeda untuk link yang aktif */
            text-decoration: underline;
        }

        @media only screen and (max-width: 768px) {
            header {
                flex-direction: column; /* Atur header menjadi kolom untuk mobile */
                text-align: center;
            }

            header h1 {
                font-size: 20px; /* Kurangi ukuran font header pada layar kecil */
                margin-bottom: 10px;
            }

            nav ul {
                flex-direction: column; /* Susun navigasi secara vertikal pada layar kecil */
            }

            nav ul li {
                padding: 10px 0;
                text-align: center; /* Buat teks navigasi berada di tengah */
            }

            .container {
                max-width: 100%; /* Gunakan lebar penuh di perangkat mobile */
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Perpustakaan Bintang</h1>
            <nav>
                <ul>
                    <li class="nav-item">
                        {{-- panggil lewat path href="/path" --}}
                        <a class="nav-link {{ Route::is('pages.home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        {{-- panggil lewat path href="/path" --}}
                        <a class="nav-link {{ Route::is('pages.home') ? 'active' : '' }}" aria-current="page" href="/#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        {{-- panggil lewat name href="{{ route('name_routenya') }}" --}}
                        <a class="nav-link {{ Route::is('data_buku') ? 'active' : '' }}" href="{{ route('data_buku.data') }}">Data Buku</a>
                    </li>
                    <li class="nav-item">
                        {{-- panggil lewat name href="{{ route('name_routenya') }}" --}}
                        <a class="nav-link {{ Route::is('pages.peminjaman') ? 'active' : '' }}" href="{{route('peminjaman_buku.data')}}">Data Peminjam</a>
                    </li>
                   
                    <li class="nav-item">
                        {{-- panggil lewat path href="/path" --}}
                        <a class="nav-link {{ Route::is('pages.home') ? 'active' : '' }}" aria-current="page" href="/#contact">Kontak</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- yield : mengisi bagian content dinamis/bagian yg akan berubah-ubah di tiap halamannya --}}
    @yield('content-dinamis')

    <footer></footer>

    {{-- CDN Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    {{-- stack : tidak wajib diisi oleh view yg extends nya (optional), kalau yield wajib diisi oleh view extends nya --}}
    @stack('script')
</body>

</html>
