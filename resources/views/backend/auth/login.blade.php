<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .login-container:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
            font-weight: 600;
        }

        .login-container .form-control {
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }

        .login-container .btn {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        .login-container .btn:hover {
            background-color: #0056b3;
        }

        .login-container .form-check-input {
            margin-top: 0.2rem;
        }

        .login-container .text-primary:hover {
            text-decoration: underline;
        }

        .login-container .d-flex {
            align-items: center;
        }

        .login-container .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" required>
            </div>
                <br>
            <!-- <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div> 
                <a href="#" class="text-primary" onclick="return confirm('Waduh! Hanya orang-orang tertentu yang mampu mengakses halaman Register!')">Register</a>
            </div> -->
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
