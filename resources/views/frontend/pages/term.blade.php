@extends('frontend.layout.app')
@section('title', 'Sanatan | Term ')
@section('content')
    <title>Term</title>
    <style>
        body {
            background-color: rgb(39, 39, 75);
            /* Purple background */
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        h1::after {
            content: "";
            display: block;
            width: 100px;
            height: 3px;
            background-color: white;
            margin: 10px auto 0;
        }

        p {
            text-align: justify;
            line-height: 1.6;
            font-size: 16px;
        }

        /*header style  */
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

        /* footer */

        .footer {
            color: white;
            padding: 30px 20px;
            border: 2px solid white;
            /* White border added */
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
            /* border-bottom: 1px solid white; */
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
    </head>

    <body>
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
