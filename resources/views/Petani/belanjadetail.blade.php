<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            max-width: 120px;
        }

        .product-detail-container {
            margin: 40px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .product-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #28a745;
        }

        .btn-custom {
            border-radius: 20px;
        }

        .thumbnail-images img {
            max-width: 60px;
            margin: 5px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .thumbnail-images img:hover {
            border-color: #28a745;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-selector input {
            text-align: center;
            width: 50px;
            height: 35px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Logo Petani Negeriku">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Service</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Belanja</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hubungi</a></li>
                </ul>
                <div class="d-flex align-items-center ms-4">
                    <a href="#" class="btn btn-success me-2">Masuk</a>
                    <a href="#" class="btn btn-outline-success">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Product Detail -->
    <div class="container product-detail-container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <img src="brocolli.png" alt="Brokoli" class="img-fluid rounded">
                <div class="thumbnail-images d-flex">
                    <img src="thumb1.png" alt="Thumb 1">
                    <img src="thumb2.png" alt="Thumb 2">
                    <img src="thumb3.png" alt="Thumb 3">
                    <img src="thumb4.png" alt="Thumb 4">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h1 class="product-title">Jual Brokoli Inagreen Farm Magelang</h1>
                <p>Magelang, Jawa Tengah</p>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="badge bg-light text-dark">Jurnal Petani</span>
                    <a href="#" class="btn btn-outline-success btn-sm">Chat Sekarang</a>
                </div>
                <p class="product-price">Rp. 40.000</p>
                <div class="mb-3">
                </div>
                <div class="quantity-selector mb-3">
                    <span>Jumlah:</span>
                    <button class="btn btn-outline-success btn-sm">-</button>
                    <input type="text" value="1">
                    <button class="btn btn-outline-success btn-sm">+</button>
                    <span>Tersisa 1900 kg</span>
                </div>
                <button class="btn btn-success btn-lg w-100 btn-custom">Beli Sekarang</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
