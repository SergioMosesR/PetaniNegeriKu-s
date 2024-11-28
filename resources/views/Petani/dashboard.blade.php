<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petani Negeriku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
        }

        .hero {
            padding: 60px 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #222;
        }

        .hero h1 span {
            color: #28a745;
            /* Warna hijau */
        }

        .hero p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
            margin: 20px 0;
        }

        .hero .btn {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 20px;
        }

        .images-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
        }

        .small-image {
            width: 70%;
            /* Atur lebar menjadi 80% dari container */
            height: 75%;
        }

        .images-container img {
            border-radius: 20px;
        }

        .rounded-image {
            border-radius: 50%;
        }

        .news-section .card {
            overflow: hidden;
            border-radius: 10px;
        }

        .news-section .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .news-section ul {
            padding: 0;
            list-style: none;
        }

        .news-section ul li h6 {
            font-size: 1rem;
        }

        .news-section ul li small {
            font-size: 0.9rem;
        }

        .move-right {
            margin-left: 90px;
            /* Pindahkan gambar ke kanan dengan menambahkan margin kiri */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a class="navbar-brand text-success" href="#">Petani Negeriku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Hubungi</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-4">
                    <a href="{{ route('NotificationPetani') }}">
                        <i class="bi bi-bell fs-5 me-3"></i>
                    </a>
                    <i class="bi bi-person fs-5"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Content -->
                <div class="col-md-6">
                    <h1>Selamat datang <br> Di <span>Petani Negeriku</span></h1>
                    <p>
                        Platform digital berbasis website yang dirancang khusus untuk memberdayakan petani Indonesia.
                        <br><br>
                        Aplikasi ini menghubungkan petani dengan dinas pertanian dan sesama petani untuk berbagi
                        informasi,
                        mengunggah hasil panen, mendapatkan harga pasar terkini, serta mengakses berita dan pelatihan
                        terbaru.
                        <br><br>
                        Melalui Petani Negeriku, kami hadir untuk membantu meningkatkan hasil pertanian, mempermudah
                        akses
                        informasi, dan memperkuat komunitas petani di seluruh Indonesia.
                    </p>
                    <p>
                        Bersama, kita tumbuhkan masa depan pertanian Indonesia yang gemilang.
                    </p>
                    <a href="#" class="btn btn-success">Ayo Mulai</a>
                </div>
                <!-- Right Content -->
                <div class="col-md-6">
                    <div class="row g-3">
                        <!-- Baris pertama -->
                        <div class="col-6">
                            <img src="{{ asset('assets/IMG/petani1.png') }}" alt="Petani" class="img-fluid rounded">
                            <img src="{{ asset('assets/IMG/petani.png') }}" alt="Petani" class="img-fluid rounded mt-2 small-image move-right">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('assets/IMG/petani2.png') }}" alt="Ladang" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Main News -->
                @foreach ($berita as $item)
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Berita</span>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="text-muted small mb-2">
                                {{ \Illuminate\Support\Str::limit($item->content, 100, '...') }}
                            </p>
                            <p class="text-muted small mb-0">
                                <small>Posted by User ID: {{ $item->user_id }} on {{ $item->created_at->format('d M Y')
                                    }}</small>
                            </p>
                            <a href="{{ url('berita/' . $item->id) }}" class="btn btn-link text-success p-0 mt-2">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
