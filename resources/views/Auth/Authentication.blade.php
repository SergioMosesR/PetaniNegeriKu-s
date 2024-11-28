<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petani NegeriKu || Authentication</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-color: #f3f4f6;
        }

        .auth-container {
            width: 900px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .left-section {
            padding: 40px;
            flex: 1;
        }

        .right-section {
            background-image: url('/assets/IMG/petani1.png');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
            position: relative;
        }

        .right-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Half-transparent black background */
            backdrop-filter: blur(5px); /* Apply blur effect */
            z-index: 1;
        }

        .right-section h2 {
            font-size: 24px;
            font-weight: bold;
            z-index: 2;
        }

        .right-section p {
            text-align: center;
            margin: 15px 0;
            line-height: 1.6;
            z-index: 2;
        }

        .right-section .btn {
            margin-top: 10px;
            z-index: 2;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .toggle-link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .toggle-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .toggle-link a:hover {
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/IMG/logo.png') }}" alt="Logo Petani Negeriku" width="120">
            </div>
            <h3 class="text-center fw-bold text-success mb-4" id="form-title">Masuk ke Petani Negeriku</h3>

            <!-- Login Form -->
            <form id="login-form" action="{{ route('AuthenticateProcess') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="#" class="text-decoration-none text-muted">Lupa Password?</a>
                </div>
                <button type="submit" class="btn btn-success w-100">Masuk</button>
                <div class="toggle-link mt-3">
                    <p>Belum punya akun? <a href="#" onclick="toggleForms()">Daftar</a></p>
                </div>
            </form>

            <!-- Register Form -->
            <form id="register-form" class="hidden" action="{{ route('AuthenticateRegister') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="register-email" class="form-label">Email</label>
                    <input type="email" name="email" id="register-email" class="form-control" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-3">
                    <label for="register-name" class="form-label">Nama</label>
                    <input type="text" name="name" id="register-name" class="form-control" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="register-password" class="form-label">Password</label>
                    <input type="password" name="password" id="register-password" class="form-control" placeholder="Masukkan password Anda" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Daftar</button>
                <div class="toggle-link mt-3">
                    <p>Sudah punya akun? <a href="#" onclick="toggleForms()">Login</a></p>
                </div>
            </form>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="overlay"></div> <!-- Overlay Layer with blur -->
            <h2>Hai, Teman!</h2>
            <p>"Masukkan detail pribadi Anda dan mulailah perjalanan bersama kami."</p>
            <a href="#" class="btn btn-outline-light" onclick="toggleForms()">Daftar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const formTitle = document.getElementById('form-title');
            loginForm.classList.toggle('hidden');
            registerForm.classList.toggle('hidden');

            // Update form title
            if (loginForm.classList.contains('hidden')) {
                formTitle.innerText = 'Daftar ke Petani Negeriku';
            } else {
                formTitle.innerText = 'Masuk ke Petani Negeriku';
            }
        }
    </script>
</body>

</html>
