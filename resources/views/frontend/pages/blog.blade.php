@extends('frontend.layout.app')
@section('title', 'Sanatan | Blog ')
@section('content')
    <br><br><br>
    <style>
         .site-title h1 {
            margin-bottom: -5px !important;
        }
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

        .banner h1 {
            font-size: 2em;
        }

        .content {
            padding: 20px;
            text-align: center;

        }

        .blog-content h2 {
            background: linear-gradient(90deg, #65A9FD 0, #7fa7e8  100%);
            /* padding: 10px; */
            width: 100%;
            text-align: center;
            /* margin-left: 214px; */
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

        .post img {
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


    </style>


    <!-- hero section -->

    <section class="banner"><br><br><br>
        <h1>Astrology, Horoscope, Tarot And More On Blog By Astroway</h1>
        <p>Find all you want to know about Astrology, Tarot, Numerology and other divine sciences with the most insightful
            articles and blogs on a vast range of topics about love, money, career, marriage, lifestyle and more.</p>
    </section>
    <br><br><br>

    <section class="blog-content">
        <h2>Recent Posts</h2>
        <br>
        <br>
        <div class="posts">
            @foreach ($blogs as $rows)
                <div class="post">
                    <img src="{{ asset('storage/' . $rows->blog_image) }}" alt="Banner Image" height="250px;">

                    <!-- <img src="assets/images/blog_1.jpg" alt="Post 1"> -->
                    <p>{{ $rows->blog_title }}</p>
                </div>
            @endforeach
            <!-- <div class="post">
                        <img src="assets/images/blog_2.jpg" alt="Post 2">
                        <p style="color: black;">5 Zodiac Signs That Are Born Clever</p>
                    </div>
                    <div class="post">
                        <img src="assets/images/blog_3.jpg" alt="Post 3">
                        <p style="color: black;">4 Zodiac Signs That Crave Physical Connection</p>
                    </div> -->
        </div>

    </section>
    <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>

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
