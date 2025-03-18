@extends('frontend.layout.app')
@section('title', 'Sanatan | Blog ')
@section('content')
<br><br><br>
<style>
    
/* 
    .banner {
            text-align: center;
            padding: 50px;
            color: #fff;
            font-size: 1em;
            text-align: center;
            font-weight: 300;
            background: url('assets/images/blog_bg.jpg') 0 0/cover no-repeat;
        } */

        .banner {

            /* height: -webkit-fill-available; */
    text-align: center;
    /* padding: 50px; */
    color: #fff;
    font-size: -5em;
    text-align: center;
    font-weight: 300;
    background: url(assets/images/blog_bg.jpg) 0 0 / cover no-repeat;
}

       .banner h1{
        font-size: 2em;
       }

        .content {
            padding: 20px;
            text-align: center;
           
        }

        .blog-content h2{
            background: linear-gradient(90deg, #65A9FD 0, #f0f3f8 100%);
            padding: 10px;
            width: 70.5%;
            margin-left: 214px;
        }

        .posts {
            display: flex;
            justify-content: center;
         
            flex-wrap: wrap;
        }
        .post {
            /* background: #660080; */
            padding: 10px;
            border-radius: 10px;
            width: 365px;
            text-align: center;
        }

        .post img{
            width: 320px;
        }

        /* header style */
        .dropdown .btn {
    background-color: orange !important;
    color: white;
    font-size: 16px;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 527%;
    width: 100%;
    margin-bottom: -2px;
}
    
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


<!-- hero section -->

    <section class="banner"><br><br><br>
        <h1>Astrology, Horoscope, Tarot And More On Blog By Astroway</h1>
        <p>Find all you want to know about Astrology, Tarot, Numerology and other divine sciences with the most insightful articles and blogs on a vast range of topics about love, money, career, marriage, lifestyle and more.</p>
    </section>
    <br><br><br>
    
    <section class="blog-content">
        <h2>Recent Posts</h2>
        <div class="posts">
            <div class="post">
                <img src="assets/images/blog_1.jpg" alt="Post 1">
                <p style="color: black;">Zodiac Signs Men Clingy in Romance</p>
            </div>
            <div class="post">
                <img src="assets/images/blog_2.jpg" alt="Post 2">
                <p style="color: black;">5 Zodiac Signs That Are Born Clever</p>
            </div>
            <div class="post">
                <img src="assets/images/blog_3.jpg" alt="Post 3">
                <p style="color: black;">4 Zodiac Signs That Crave Physical Connection</p>
            </div>
        </div>
    </section>
    <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br>

         <script>
         function toggleMenu() {
            var menu = document.getElementById("mobileMenu");
            if (menu.style.display === "flex") {
                menu.style.display = "none";
            } else {
                menu.style.display = "flex";
            }
        }
    </script>
