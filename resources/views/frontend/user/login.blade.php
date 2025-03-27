@extends('frontend.layout.app')
@section('title', 'Sanatan | About Us ')
@section('content')
<?php
// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    // Basic validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        // Here you would typically check the user credentials against the database
        // For this example, we'll just display a success message
        $success_message = "Login successful!";
    }
}
?>


  
    <style>

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

        body {
            font-family: Arial, sans-serif;
            background-color: rgb(39, 39, 75) ;
            margin: 0;
            padding: 0;
        }

        .container {
            display: block!important;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: darkcyan;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 10%;
            border-radius: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
 
        /* Media Queries for Responsiveness */
@media (max-width: 768px) {
    header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .logo {
        margin-left: 0;
        width: 100%;
        margin-top: 10px;
    }

    .logo img {
        margin-left: 0;
    }

    .logo span {
        margin-left: 0;
    }

    .logo p {
        margin-left: 0;
    }

    .lang {
        margin-left: 0;
        margin-top: 10px;
        width: 100%;
    }

    .lang button {
        margin-left: 0;
        margin-top: 10px;
        width: 100%;
    }

    .dropdwn ul {
        left: 0;
        width: 100%;
        background-color: rgb(39, 39, 75);
    }

    .signup-btn, .login {
        margin-left: 0;
        margin-top: 10px;
        width: 100%;
    }

    .toggle-btn {
        margin-right: 0;
        margin-top: 10px;
        width: 100%;
    }

    .mobile-menu {
        top: 340px;
        left: 187px;
        width: 100%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        display: none;
    }

    .menu-section {
        width: 100%;
        margin-top: 10px;
    }

    .mobile-menu a {
        font-size: 16px;
        width: 100%;
        text-align: center;
    }

    .mobile-menu li {
        padding: 5px 0;
        width: 100%;
        text-align: center;
        background-color:rgb(39, 39, 75);
    }
}

@media (max-width: 480px) {

    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html, body {
    overflow-x: hidden; /* Left side scroll ko hata diya */
    width: 100%; /* Puri screen ko cover karega */
}

    .logo img {
        height: 40px;
        width: 40px;
    }

    .logo span {
        font-size: 16px;
    }

    .logo p {
        font-size: 12px;
    }

    .signup-btn, .login {
        font-size: 16px;
    }

    .lang button {
        font-size: 14px;
    }
}


        @media (max-width: 768px) {
            .container {
                margin: 20px;
            }
        }
    </style>

    <div class="container">
        <h2>User Login</h2>
        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($success_message)): ?>
            <div class="success">
                <p><?php echo $success_message; ?></p>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Login">
        </form>
    </div>

    <script>
         // toggle menu bar 
         function toggleMenu() {
            var menu = document.getElementById("mobileMenu");
            if (menu.style.display === "flex") {
                menu.style.display = "none";
            } else {
                menu.style.display = "flex";
            }
        }
    </script>

