@extends('frontend.layout.app')
@section('title', 'Sanatan | About Us ')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css">

    <div class="auth-wrapper" id="authContainer">
        <div class="auth-form auth-signup">
            <form>
                <h1>Create Account</h1>
                <div class="social-icons-auth">
                    <a href="#" target="_blank">
                        <img src="assets/images/login_with_google.png" alt="Google" width="30" height="30">
                    </a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Sign Up</button>
            </form>
        </div>

        <div class="auth-form auth-signin">
            <form>
                <h1>Sign In</h1>
                <div class="social-icons-auth">
                    <a href="#"><i class="fab fa-google"></i></a>  <a href="#" target="_blank">
                        <img src="assets/images/login_with_google.png" alt="Google" width="30" height="30">
                    </a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Forget Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>

        <div class="auth-toggle-container">
            <div class="auth-toggle">
                <div class="auth-panel auth-panel-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="auth-hidden" id="authLoginBtn">Sign In</button>
                </div>
                <div class="auth-panel auth-panel-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details to start your journey with us</p>
                    <button class="auth-hidden" id="authRegisterBtn">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const authContainer = document.getElementById('authContainer');
        const authRegisterBtn = document.getElementById('authRegisterBtn');
        const authLoginBtn = document.getElementById('authLoginBtn');

        authRegisterBtn.addEventListener('click', () => {
            authContainer.classList.add('active');
        });

        authLoginBtn.addEventListener('click', () => {
            authContainer.classList.remove('active');
        });
    </script>
@endsection
