<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petani NegeriKu || Authentication</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }

        .auth-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .auth-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
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
        <!-- Login Form -->
        <div id="login-form">
            <h1 class="h4">Login</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('AuthenticateProcess') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="toggle-link mt-3">
                <p>Don't have an account? <a href="#" onclick="toggleForms()">Register</a></p>
            </div>
        </div>

        <!-- Register Form -->
        <div id="register-form" class="hidden">
            <h1 class="h4">Register</h1>
            <form action="{{ route('AuthenticateRegister') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="register-email" class="form-label">Email</label>
                    <input type="email" name="email" id="register-email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="register-name" class="form-label">Name</label>
                    <input type="text" name="name" id="register-name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="register-password" class="form-label">Password</label>
                    <input type="password" name="password" id="register-password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Register</button>
            </form>

            <div class="toggle-link mt-3">
                <p>Already have an account? <a href="#" onclick="toggleForms()">Login</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            loginForm.classList.toggle('hidden');
            registerForm.classList.toggle('hidden');
        }
    </script>
</body>

</html>
