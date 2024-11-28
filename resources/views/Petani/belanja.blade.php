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

        .products-banner {
            background-image: url('/assets/IMG/backgroud.png');
            /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            height: 240px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .products-banner h2 {
            font-size: 3rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .products-section {
            background-color: #f9f9f9;
            padding: 40px 0;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            background-color: #fff;
            transition: transform 0.3s ease;
        }

        .product-card img {
            border-radius: 10px;
            max-width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-title {
            font-size: 1rem;
            font-weight: bold;
            margin: 10px 0;
            color: #222;
        }

        .product-price {
            font-size: 0.9rem;
            color: #28a745;
        }

        .filter-dropdown {
            margin-bottom: 20px;
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
                        <a class="nav-link text-dark" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="#">Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Hubungi</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-4">
                    <a href="#" class="btn btn-success me-2">Masuk</a>
                    <a href="#" class="btn btn-outline-success">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Products Banner -->
    <section class="products-banner">
        <h2>Produk</h2>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="row filter-dropdown">
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>Kategori</option>
                        <option value="1">Sayur</option>
                        <option value="2">Buah</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>Lokasi</option>
                        <option value="1">Jawa Barat</option>
                        <option value="2">Jawa Tengah</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>Harga</option>
                        <option value="1">Termurah</option>
                        <option value="2">Termahal</option>
                    </select>
                </div>
            </div>
            <div class="row g-4">
                @livewire('pembelanjaan')
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
