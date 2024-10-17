@extends('templates.app')


@section('content-dinamis')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Bintang</title>
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body{
    height: 100%;
}
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    background-color: #f8f9fa;
    color: #333;
}

header {
    background-color: #1a73e8; /* Warna biru tua */
    color: #fff;
    padding: 20px 0;
    display: flex;
}

.container {
    width: 80%;
    margin: 0 auto;
}

header h1 {
    float: left;
    font-size: 28px;
    margin-left: 20px;
}

nav {
    float: right;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

nav ul li a:hover {
    color: #ffd700; /* Warna emas */
}

.hero {
    background: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?fit=crop&w=1050&q=80');
    min-height: 100vh;
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.hero h2 {
    font-size: 50px;
    margin-bottom: 20px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}

.hero p {
    font-size: 22px;
    margin-bottom: 40px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}

.cta-button {
    background: #ffd700; /* Warna emas */
    color: #1a73e8; /* Warna biru tua */
    padding: 12px 25px;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    border-radius: 50px;
    transition: background 0.3s ease;
}

.cta-button:hover {
    background: #ffc107; /* Warna emas yang sedikit lebih gelap */
}

section {
    padding: 60px 0;
}

#about, #services, #contact {
    text-align: center;
}

#about h2, #services h2, #contact h2 {
    color: #1a73e8;
    margin-bottom: 20px;
    font-size: 36px;
}

#about p {
    font-size: 18px;
    color: #666;
    max-width: 700px;
    margin: 0 auto;
}

.services-grid {
    display: flex;
    justify-content: space-around;
    margin-top: 40px;
}

.service-item {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    width: 30%;
    transition: transform 0.3s ease;
}

.service-item:hover {
    transform: translateY(-10px);
}

.service-item h3 {
    margin-bottom: 15px;
    font-size: 24px;
    color: #1a73e8;
}

.service-item p {
    font-size: 16px;
    color: #555;
}

form {
    max-width: 600px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
}

form input, form textarea {
    padding: 12px;
    margin-bottom: 20px;
    border: 2px solid #1a73e8;
    border-radius: 10px;
    font-size: 16px;
    background-color: #f8f9fa;
}

form button {
    padding: 12px;
    border: none;
    background: #1a73e8;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 10px;
    transition: background 0.3s ease;
}

form button:hover {
    background: #0056b3;
}

footer {
    background: #1a73e8;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

footer p {
    font-size: 16px;
}


   /* Animasi fade-in untuk teks selamat datang */
   @keyframes fadeIn {
       0% {
           opacity: 0;
           transform: translateY(-50px);
       }
       100% {
           opacity: 1;
           transform: translateY(0);
       }
   }

   .hero h2 {
       font-size: 50px;
       margin-bottom: 20px;
       text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
       opacity: 0;
       animation: fadeIn 2s ease-in-out forwards; /* Efek fade-in */
   }

   /* Efek untuk paragraf */
   @keyframes fadeInText {
       0% {
           opacity: 0;
           transform: translateY(50px);
       }
       100% {
           opacity: 1;
           transform: translateY(0);
       }
   }

   .hero p {
       font-size: 22px;
       margin-bottom: 40px;
       text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
       opacity: 0;
       animation: fadeInText 3s ease-in-out forwards;
       animation-delay: 0.5s; /* Tunda sedikit agar muncul setelah teks selamat datang */
   }

   /* Efek untuk tombol */
   @keyframes fadeInButton {
       0% {
           opacity: 0;
           transform: translateY(50px);
       }
       100% {
           opacity: 1;
           transform: translateY(0);
       }
   }

   .cta-button {
       background: #ffd700; /* Warna emas */
       color: #1a73e8; /* Warna biru tua */
       padding: 12px 25px;
       text-decoration: none;
       font-size: 20px;
       font-weight: bold;
       border-radius: 50px;
       transition: background 0.3s ease;
       opacity: 0;
       animation: fadeInButton 4s ease-in-out forwards;
       animation-delay: 1s; /* Tunda agar muncul setelah teks paragraf */
   }

   .cta-button:hover {
       background: #ffc107; /* Warna emas yang sedikit lebih gelap */
   }

/* Media Query untuk tampilan HP dengan lebar layar maksimal 768px */
@media only screen and (max-width: 768px) {
    .container {
        width: 100%; /* Buat lebar container menjadi 100% */
        padding: 0 20px; /* Tambahkan sedikit padding agar tidak terlalu menempel */
    }

    header h1 {
        font-size: 22px; /* Perkecil ukuran font untuk header */
        margin-left: 10px;
    }

    nav ul li {
        margin: 0 8px; /* Kurangi jarak antar menu navigasi */
    }

    nav ul li a {
        font-size: 16px; /* Perkecil ukuran font untuk link navigasi */
    }

    .hero h2 {
        font-size: 36px; /* Kurangi ukuran font untuk judul utama di hero section */
    }

    .hero p {
        font-size: 18px; /* Perkecil ukuran font untuk paragraf di hero section */
    }

    .cta-button {
        padding: 10px 20px; /* Sesuaikan padding tombol */
        font-size: 18px; /* Sesuaikan ukuran font tombol */
    }

    /* Buat layanan (services) menjadi tampilan vertikal pada HP */
    .services-grid {
        flex-direction: column; /* Ubah layout grid menjadi kolom */
    }

    .service-item {
        width: 100%; /* Buat layanan full width pada tampilan mobile */
        margin-bottom: 20px; /* Tambahkan jarak antar layanan */
    }

    form input, form textarea {
        font-size: 14px; /* Perkecil ukuran input */
        padding: 10px; /* Sesuaikan padding */
    }

    form button {
        font-size: 16px; /* Sesuaikan ukuran tombol */
    }

    /* Footer styling */
    footer p {
        font-size: 14px; /* Perkecil ukuran teks di footer */
    }
}

    </style>
</head>
<body>
    {{-- <header>
        <div class="container">
            <h1>Perpustakaan Bintang</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header> --}}

    <section id="home">
        <div class="hero">
            <h2>Selamat Datang di Perpustakaan Bintang</h2>
            <p>Temukan ribuan buku berkualitas untuk menambah wawasan dan pengetahuan Anda.</p>
            <a href="{{route('data_buku.data')}}" class="cta-button">Jelajahi Sekarang</a>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Perpustakaan Bintang adalah perpustakaan digital yang menyediakan berbagai macam buku untuk segala usia. Kami berkomitmen untuk memberikan layanan terbaik kepada pengunjung kami dengan koleksi buku terbaru dan akses yang mudah.</p>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <h2>Layanan Kami</h2>
            <div class="services-grid">
                <div class="service-item">
                    <h3>Peminjaman Buku</h3>
                    <p>Kami menyediakan layanan peminjaman buku secara online maupun offline.</p>
                </div>
                <div class="service-item">
                    <h3>Akses Digital</h3>
                    <p>Nikmati akses ke ribuan buku digital dari berbagai genre dan kategori.</p>
                </div>
                <div class="service-item">
                    <h3>Event & Workshop</h3>
                    <p>Ikuti berbagai acara dan workshop literasi yang diadakan secara rutin.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2>Kontak Kami</h2>
            <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami melalui form di bawah ini.</p>
            <form action="#">
                <input type="text" placeholder="Nama Lengkap" required>
                <input type="email" placeholder="Email" required>
                <textarea placeholder="Pesan" required></textarea>
                <button type="submit">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Perpustakaan Bintang. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>
    @endsection
</body>
</html>
