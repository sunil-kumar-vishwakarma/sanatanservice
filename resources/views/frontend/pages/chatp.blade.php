
@extends('frontend.layout.app')
@section('title', 'Sanatan | Home ')
@section('content')

<style>

body {
            background-color: rgb(39, 39, 75); /* Purple background */
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

/* header style */
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

/* 🔹 Dropdown and Sign-up Container */
.dropdown {
    position: absolute;
    display: inline-block;
}

/* 🔹 Dropdown Button */
.dropdown .btn {
    background-color: orange !important;
    color: white;
    font-size: 16px;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 543%;
    width: 100%;
    margin-bottom: -10px;
}

/* 🔹 Dropdown Menu - Ensures it appears above content */
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    min-width: 150px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* Makes sure it's above other elements */
    display: none;
}

/* 🔹 Show dropdown on hover */
.dropdown:hover .dropdown-menu {
    display: block;
}

/* 🔹 Sign-up Button */
.signup-btn {
    padding: 10px 20px;
    text-decoration: none;
    color: white;
    justify-content: center;
    width: 5%;
    margin-left: 15%;
    margin-top: 20px;
    font-size: 20px;
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
    /* transform: translateX(-145px); */
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

/* main section */
.search-bar {
            display: flex;
            justify-content: center;
            padding: 20px;
            background: #4a0072;
        }
        .search-bar input, .search-bar select {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: none;
            width: 200px;  
        }
        .astrologers {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .astrologer-card {
            background: #500062;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            text-align: center;
            width: 200px;
        }
        .astrologer-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .astrologer-card button {
            display: block;
            margin: 5px 20px;
            padding: 10px;
            background: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline;
        }

        /* footer style */
        .footer {
color: white;
padding: 30px 20px;
border: 2px solid white; /* White border added */
margin-top: 20px;
}

.footer-container {
display: flex;
flex-wrap: wrap;
justify-content: space-between;
max-width: 1200px;
margin: 0 auto;
}

.footer-section {
flex: 1;
min-width: 200px;
margin: 10px;
}

.footer-section h3 {
font-size: 18px;
margin-bottom: 10px;
border-bottom: 1px solid white;
padding-bottom: 5px;
}

.footer-section ul {
list-style: none;
padding: 0;
margin: auto;
}

.footer-section ul li {
margin-bottom: 5px;
font-size: 14px;
transition: color 0.3s;
}

.footer-section ul li:hover {
color: #f39c12;
cursor: pointer;
}

.footer-section img {
width: 150px;
margin: 5px 0;
}

.social-icons {
display: flex;
gap: 10px;
margin-top: 10px;
}

.social-icons img {
width: 30px;
transition: transform 0.3s;
}

.social-icons img:hover {
transform: scale(1.1);
}

.copy {
text-align: center;
color: white;
padding: 10px;
font-size: 14px;
margin-top: 10px;
}


/* Responsive Footer */
@media (max-width: 768px) {
.footer-container {
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.footer-column {
    width: 100%;
    margin-bottom: 20px;
}
}

</style>

<main>
        <section class="search-bar">
            <h2 style="background-color: #13132b; margin-right:200px;">Chat with Pandit Ji</h2>
            <input type="text" placeholder="Search Astrologers">
            <select>
                <option>Online</option>
                <option>Low Experience</option>
                <option>High Experience</option>
                <option>Lower Price</option>
                <option>High Price</option>
            </select>
            <select>
                <option>All</option>
                <option>New category</option>
                <option>Maritial life</option>
                <option>Kids</option>
                <option>Education</option>
                <option>Finance & Business</option>
                <option>Love & Relationship</option>
            </select>
        </section>

        <section class="astrologers">
            <div class="astrologer-card">
                <img src="assets/images/astro_1739789432 copy.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astro_1739789432.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740224437ff.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
            <div class="astrologer-card">
                <img src="assets/images/astrologer_1740079890dd.png" alt="Astrologer">
                <h3>Raj</h3>
                <p>Experience: 10 Years</p>
                <p>Fee: 5₹/Min (FREE)</p>
                <p>Category:Job & Kids</p>
                <button>Chat</button>
            </div>
        </section>
    </main>

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

   