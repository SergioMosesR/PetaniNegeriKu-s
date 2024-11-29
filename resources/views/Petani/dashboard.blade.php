<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard || Petani Negeriku</title>

    <!-- Menggunakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS tambahan untuk memastikan card berada di tengah layar */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .main-container {
            min-height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .card {
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: white;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="main-container">
        <h1 class="text-center text-primary">Petani Negeriku</h1>

        <a href="{{ route('NotificationPetani') }}"><i class="fa-regular fa-bell"></i></a>
        <a href="{{ route('KomunitasPetani') }}"><i class="fa-solid fa-user-group"></i></a>
        <a href="{{ route('BeritaPetani') }}"><i class="fa-solid fa-newspaper"></i></a>
        <!-- Card Pembelanjaan -->
        <div class="card">
            <div class="card-body">
                @livewire('pembelanjaan')
                <!-- Gantikan dengan komponen Livewire yang sesuai -->
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
