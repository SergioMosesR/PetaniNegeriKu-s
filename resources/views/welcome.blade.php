<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petani NegeriKu || Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('IMG/Sawah.jpg') }}') no-repeat center center/cover;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .landing-container {
            position: relative;
            z-index: 2;
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .landing-container h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #4caf50;
        }

        .landing-container p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: #6c757d;
        }

        .btn-auth {
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            margin: 0.5rem;
        }

        .btn-login {
            background-color: #4caf50;
            color: #fff;
            border: none;
        }

        .btn-login:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="landing-container">
        <h1>Selamat Datang di Petani NegeriKu</h1>
        <p>Tempat terbaik untuk mengelola hasil pertanian dan membangun masa depan yang lebih hijau.</p>
        <div>
            <a href="{{ route('Authenticate') }}" class="btn btn-auth btn-login">Masuk</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
