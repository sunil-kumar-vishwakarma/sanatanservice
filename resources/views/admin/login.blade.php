<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Centering and proper alignment */
.login-container {
    border: 2px solid;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    width: 80%;
    max-width: 50rem;
    background-color: #24007a;
    box-shadow: 0 .25rem .5rem rgba(0, 0, 0, 0.1);
    border-radius: .5rem;
    overflow: hidden;
}

/* Fixing alignment for image & text */
.login-image {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    background: linear-gradient(120deg, #ffffff, #e8e8e8, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0px 4px 6px rgba(255, 255, 255, 0.3);
    text-align: center;
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 2.5rem;
}

.login-image img {
    width: 100%;
    max-width: 20rem;
    height: auto;
    border-radius: 50%;
    margin-bottom: 1.25rem;
}

/* Fixing text alignment */
.login-image h1 {
    margin: 0;
    font-size: 3rem;
    text-align: center;
}

.login-image p {
    margin-top: 0.3125rem;
    font-size: 1rem;
    text-align: center;
}

/* Fixing login form alignment */
.login-form {
    flex: 1;
    padding: 2.5rem;
    background-color: white;
    width: 50%;
}

.login-form h2 {
    margin-top: 0;
    margin-bottom: 1.25rem;
    text-align: center;
}

.login-form .form-group {
    margin-bottom: 0.9375rem;
}

/* Fixing input field alignment */
.login-form .form-control {
    width: 100%;
    padding: 0.625rem;
    border-radius: 0.25rem;
    border: 0.0625rem solid #ced4da;
    font-size: 1rem;
}

/* Fixing button alignment */
.login-form .btn-login {
    background-color: #24007a;
    color: white;
    padding: 0.625rem;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
    width: 100%;
    font-size: 1rem;
}

.login-form .btn-login:hover {
    background-color: #24007a;
}

/* Responsive Fixes */
@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
        width: 90%;
    }

    .login-image, .login-form {
        width: 100%;
        border-radius: 0;
    }

    .login-image {
        padding: 1.5rem;
    }

    .login-form {
        padding: 2rem;
    }
}

  </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image">
            {{-- <img src="{{ asset('assets/login-logo.png') }}" alt="Admin Panel Logo"> --}}
            <h1>SANATAN</h1>
            <p>Astrology Prediction by Astrologers</p>
        </div>
        <div class="login-form">
            <h2>Sign In</h2>
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
