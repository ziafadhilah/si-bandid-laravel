<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background-color: #fff;
            border-radius: .5rem;
            box-shadow: 0 0 .5rem rgba(0, 0, 0, .1);
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
        }

        .login-container .form-group {
            margin-bottom: 1rem;
        }

        .login-container .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-input" name="name" id="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-input" name="email" id="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-input" name="password" id="password" required>
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password:</label>
            <input type="password" class="form-input" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class="form-group mb-3">
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
