<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile || Petani Negeriku</title>

    <!-- Menggunakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS tambahan untuk memastikan card berada di tengah layar */
        html,
        body {
            height: 100%;
        }

        .main-container {
            min-height: 100%;
            display: flex;
            flex-direction: column;
            /* Mengatur posisi card agar ada di bawah satu sama lain */
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            /* Menambahkan transparansi pada background */
        }

        .card {
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Menurunkan opacity background card */
            margin-bottom: 20px;
            /* Memberikan jarak antar card */
        }

        .card-body {
            background-color: white;
            /* Memastikan isi card tetap sepenuhnya putih */
        }
    </style>
</head>

<body class="bg-light">

    <div class="main-container">
        <!-- Card Profile Petani -->
        <div class="card">
            <div class="card-body">
                @livewire('profilepetani')
            </div>
        </div>

        <!-- Card Post -->
        <div class="card">
            <div class="card-body">
                @livewire('post')
            </div>
        </div>
    </div>

    <!-- Menggunakan Bootstrap JS (jika perlu) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
