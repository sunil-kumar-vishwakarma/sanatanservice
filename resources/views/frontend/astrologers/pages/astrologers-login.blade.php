
@extends('frontend.layout.app')
@section('title', 'Sanatan | Astrologer Login ')
@section('content')
    <style>
        
        body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

    .section {
        height: 100vh;
        width: 100%;
        /* background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(login/banner.jpg); */
        background-position: center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }

  

.section
  .form-box{
    /* width: 380px; */
    height: 525px;
    position: relative;
    margin: 6% auto;
    background: #fff;
    padding: 5px;
    overflow: hidden;
    border-radius: 10px;
    width: 380px;
        /* padding: 20px; */
        /* background: white; */
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
}

.section h3{
  text-align: center;
  color: blue;
  font-weight: 200;
}

.section
  .button-box{
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 20px 9px #ff61241f;
    border-radius: 30px; 
}
.section .toggle-btn1{
    padding: 10px 30px;
    cursor: pointer;
    background: transparent;
    border: 0;
    outline: none;
    position: relative;
    color: pink;
    
}
.section #btn{
    top: 0;
    left: 0;
    position: absolute;
    width: 110px;
    height: 100%;
    background: linear-gradient(to right,rgb(48, 25, 95),rgb(57, 31, 96));
    border-radius: 30px;
    transition: .5s;
}
.section .social-icons{
    margin: 30px auto;
    text-align: center;
    padding-left: 130px;
}
.section .social-icons img{
    width: 30px;
    margin: 0 12px;
    box-shadow: 0 0 20px 0 #7f7f7f3d;
    cursor: pointer;
    border-radius: 50%;
}
.section .input-group{
    top: 180px;
    position: absolute;
    width: 280px;
    transition: .5s;
}
.section .input-field{
    width: 100%;
    padding: 10px 0;
    margin: 5px 0;
    border-left: 0;
    border-top: 0;
    border-right: 0;
    border-bottom: 1px solid #999;
    outline: none;
    background: transparent;

}
.section .submit-btn {
    width: 85%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: auto;
    background: linear-gradient(to right,rgb(37, 33, 96),rgb(45, 22, 75));
    border: 0;
    outline: none;
    border-radius: 30px;
    color: white;

}
.section .check-box{
    margin: 30px 10px 30px 0;
}
.section span{
    color: #777;
    font-size: 12px;
    bottom: 68px;
    position: absolute;

}

.section #login{
    left: 50px;
}
.section #register{ 
    left: 450px;
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
        margin-left: -712%;
        margin-top: 47%;
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

.container {
            display: block!important;
         
           
        }
        
      </style>
 <div class="container">


    <div class="section">
        <!-- Form Part -->
        <div class="form-box">
        <h3>Astrologer Login</h3>
            <div class="button-box">
                <div id="btn"></div>

                <!-- <button type="button" class="toggle-btn1" onclick="login()">Login</button> -->
                <!-- <button type="button" class="toggle-btn1" onclick="register()">Register</button> -->
            </div>
            <div class="social-icons">

                 <a href="https://www.fb.com/"><img src="assets/images/facebook.png"></a>
                <!-- <a href="https://www.twitter.com/"><img src="assets/images/twitter.png"></a> -->
                <a href="https://www.google.com/"><img src="assets/images/google.png"></a>
            </div>

            <form id="login" class="input-group">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="text" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>

            <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="email" class="input-field" placeholder="Email Id" required>
                <input type="text" class="input-field" placeholder="Enter Password" required>
                <input type="number" class="input-field" placeholder="Exprience" required>
                <input type="text" class="input-field" placeholder="Catagory" required>
                <input type="checkbox" class="check-box"><span>I agree to the terms & condition</span>
                <button type="submit" class="submit-btn">Ragister</button>
            </form>
        </div>
    </div>
</div>
    <!-- JavaScript Part -->
    <script>
            
            function toggleMenu() {
            var mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
        }

        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        // Register and login Function.
        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
