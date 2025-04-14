@extends('frontend.layout.app')
@section('title', 'Sanatan | About Us ')
@section('content')
<style>
       .container-data h1::after {
            content: "";
            display: block;
            width: 100px;
            height: 3px;
            background-color: white;
            margin: 10px auto 0;
        }

</style>
    <div class="container-data">
        <h1>{{ $pages->title }}</h1><br><br>
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
