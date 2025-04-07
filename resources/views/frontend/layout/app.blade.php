<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanatan</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link rel="stylesheet" href="css\style_index.css">
<!-- <link rel="stylesheet" href="css\style1.css"> -->
     <style>
        /* 🔹 Header Styling */
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    background: rgb(39, 39, 75); /* Dark purple background */
    color: white;
    position: relative;
    z-index: 10;
}

/* 🔹 Logo Section */
.logo {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    height: 80px;
    margin-left: 100px;
    width: 30%;
}


.logo img {
    height: 50px;
    margin-left: 100%;
    margin-top: 18px;
    border-radius: 50%;
}

.logo span {
    font-size: 18px;
    font-weight: bold;
    margin-top: -57px;
    margin-right: 50%;
    width: 80%;
    margin-left: 149px;
}

.logo p {
    font-size: 14px;
    margin-top: 5px;
    margin-left: 32%;
    width: 140%;
    background-color:rgb(39, 39, 75);
}



/* 🔹 Sign-up Button */
.signup-btn {
    /* padding: 10px 20px; */
    text-decoration: none;
    color: white;
    justify-content: center;
    width: 5%;
    margin-left: 5%;
    margin-top: 20px;
    font-size: 20px;
}

.login {
    font-size: 20px;
    margin-top: 20px;
    margin-right: 0%;
    color: white;
}

/* Toggle Button */
/* Toggle Button */
.toggle-btn {
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    margin-right: 10%;
    height: 20px;
}

/* Mobile Menu (Initially Hidden) */
.mobile-menu {
    display: none; /* Hidden by default */
    background: rgb(39, 39, 75); /* Purple Background */
    position: absolute;
    top: 110px;
    transform: translateX(-50%);
    width: 80%;
    padding: 20px;
    max-width: 1258px;
    text-align: left;
    border-radius: 10px;
    left: 48%;
    gap: 6px;
}

/* Show Menu on Active */
.mobile-menu.active {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 40px; /* Space between columns */
}

/* Each Section */
.menu-section {
    flex: 1;
    min-width: 200px; /* Minimum width per section */
}

/* Headings (ASTROLOGY, PANDIT JI, etc.) */
.mobile-menu a {
    font-size: 18px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    display: block;
    margin-bottom: 10px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
}

/* UL List */
.mobile-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* LI Items */
.mobile-menu li {
    padding: 5px 0;
    color: white;
    margin-bottom: 5px;
}

.lang {
    position: relative;
    display: inline-block;
}

.lang button {
    padding: 10px 20px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    cursor: pointer;
    border-radius: 20px;
}

.dropdwn ul {
    list-style: none;
    padding: 0;
    margin: 0;
    position: absolute;
    top: 100%;
    left: 0;
    background: rgb(39, 39, 75);
    border: 1px solid #ccc;
    display: none;
    z-index: 10;
    width: 99%;
    border-radius: 20px;
}

.dropdwn ul li {
    padding: 10px;
    cursor: pointer;
}

.dropdwn ul li:hover {
    background-color:orangered;
    border-radius: 10px;
}

/* Hover effect */
.lang:hover .dropdwn ul {
    display: block;
}





@media (max-width: 768px) {
    header {
        flex-direction: column;
        text-align: center;
    }

    .dropdown, .signup-btn {
        margin-top: 10px;
        margin-right: 50px;
    }
}

/* Make Navbar Fixed at the Top */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    /* background: #fff; Change to match your theme */
    z-index: 1000; /* Ensure it's above other elements */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow effect */
    padding: 10px 20px;
}





     </style>
</head>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

<body>
<header class="navbar">
    @include('frontend.layout.navbar')
</header>
    <div class="main-content">

        @yield('content')
        @include('frontend.layout.footer')
    </div>

    <!-- Scripts Section -->
    <!-- <script src="{{ asset('assets/js/main.js') }}"></script> -->
    @yield('scripts')

</body>
</html>
