@extends('frontend.layout.app')
@section('title', 'Sanatan | Privacy ')
@section('content')
    <style>
        body {
            background-color: rgb(39, 39, 75);
            /* Purple background */
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-data h1::after {
            content: "";
            display: block;
            width: 100px;
            height: 3px;
            background-color: white;
            margin: 10px auto 0;
        }

        .container-data p {
            text-align: justify;
            line-height: 1.6;
            font-size: 16px;
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
            margin-bottom: -11px;
        }

    </style>

    <div class="container-data">
        <h1>{{ $pages->title }}</h1><br>
        {!! $pages->description !!}
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
