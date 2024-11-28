<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelayanan Kami - Petani Negeriku</title>
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
            background: url('backgroundservice.png') no-repeat center center/cover;
            padding: 40px 0;
        }

        .service-section {
            padding: 60px 0;
        }

        .service-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            color: #28a745;
        }

        .service-card {
            background-color: #f9f9f9;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-card i {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: 15px;
        }

        .service-card h5 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .service-card p {
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <img src="logo.png" alt="Petani Negeriku">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-success" href="#">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Hubungi</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-4">
                    <i class="bi bi-bell fs-5 me-3"></i>
                    <i class="bi bi-person fs-5"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Pelayanan Kami Section -->
    <section class="service-section">
        <div class="container">
            <h2>Pelayanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="bi bi-upload"></i>
                        <h5>Unggah Produk</h5>
                        <p>Anda dapat mengunggah hasil pertanian untuk dijual di pasar online kami.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="bi bi-bell"></i>
                        <h5>Notifikasi</h5>
                        <p>Informasi terkini terkait berita, harga pasar, dan pengumuman dinas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="bi bi-chat-dots"></i>
                        <h5>Forum Chat/Diskusi</h5>
                        <p>Berbagi pengalaman dan berdiskusi dengan sesama petani.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="bi bi-file-text"></i>
                        <h5>Berita Dinas</h5>
                        <p>Akses berita resmi dari dinas terkait kebijakan dan informasi terbaru.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="bi bi-bar-chart"></i>
                        <h5>Statistik Petani</h5>
                        <p>Data petani dan hasil pertanian terkini untuk mendukung perencanaan usaha.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="bi bi-megaphone"></i>
                        <h5>Undangan Sosialisasi</h5>
                        <p>Mengikuti kegiatan pelatihan dan sosialisasi dinas untuk pengembangan diri.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
