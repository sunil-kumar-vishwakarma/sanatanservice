@extends('frontend.layout.app')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .astroway-menu {
            background: rgba(54, 0, 100, 0.9) !important;
            padding: 20px 0;
        }

        .astroway-menu .container {
            max-width: 100%;
            /* Ensure container does not exceed the width of the viewport */
        }

        .astroway-menu ul {
            display: flex;
            justify-content: space-around;
            /* Distribute items evenly in the line */
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .astroway-menu li {
            flex: 0 0 auto;
            /* Allow items to shrink and grow as needed */
            text-align: center;
            margin: 0 10px;
            /* Add some space between the items */
        }

        .astroway-menu a {
            display: block;
            /* Make the link block-level to contain the image and text */
            text-decoration: none;
            color: #333;
            /* Text color */
            transition: transform 0.3s ease;
            /* Smooth transition for hover effect */
        }

        .astroway-menu .icon {
            display: inline-block;
            /* Display the icon as an inline block */
            width: 50px;
            /* Set the width of the icon */
            height: 50px;
            /* Set the height of the icon */
            background-color: #f0f0f0;
            /* Light grey background for the icon */
            border-radius: 50%;
            /* Make the icon circular */
            overflow: hidden;
            /* Hide any overflow */
            margin-bottom: 5px;
            /* Space between icon and text */
        }

        .astroway-menu img {
            width: 100%;
            /* Make the image responsive */
            height: auto;
            /* Maintain aspect ratio */
            vertical-align: middle;
            /* Align the image vertically */
        }

        .astroway-menu .icon-desc {
            font-size: 14px;
            /* Size of the zodiac sign text */
            color: #333;
            /* Text color */
        }

        @media (max-width: 768px) {
            .astroway-menu ul {
                flex-direction: column;
                /* Stack the items vertically on small screens */
            }

            .astroway-menu li {
                margin: 10px 0;
                /* Space between items on small screens */
            }
        }

        .ds-head-populararticle {
            background: rgb(39, 39, 75);
            /* White background */
            padding: 20px 0;
        }

        .ds-head-populararticle .container {
            max-width: 100%;
            padding: 0 15px;
            /* background: rgb(39, 39, 75); */
            background: linear-gradient(to top, rgba(54, 0, 100, 0.9), #000000) !important;
            flex-direction: column;
            /* Adjust padding as needed */
        }

        .ds-head-populararticle .row {
            align-items: center;
            /* Vertically align items */
        }

        .ds-head-populararticle .col-12.text-center {
            text-align: center;
            /* Center text */
        }

        #cardholder {
            display: inline-block;
            /* Display as inline block to center */
            /* border: 1px solid #ddd; */
            /* Add border */
            border-radius: 10px;
            /* Rounded corners */
            padding: 10px;
            /* Add padding */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Add shadow */
        }

        .card-link,
        .btn {
            margin: 0 5px;
            /* Space between buttons */
            padding: 10px 20px;
            /* Adjust padding as needed */
            border-radius: 25px;
            /* Rounded corners */
            font-size: 14px;
            /* Adjust font size as needed */
            font-weight: 600;
            /* Semi-bold font */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Smooth transition */
            text-decoration: none;
        }

        .card-link:hover,
        .btn:hover {
            background-color: #f0f0f0;
            /* Light grey background on hover */
        }

        .card-link.active,
        .btn.active {
            background-color: #d32f2f;
            /* Red background for active button */
            color: #ffffff;
            /* White text color */
        }

        .tab-content {
            margin-top: 20px;
            /* Space between buttons and content */
        }

        .tab-pane {
            display: none;
            /* Hide all tab panes by default */
        }

        .tab-pane.active {
            display: block;
            /* Show active tab pane */
        }

        .dailyhoroscope-content {
            margin-top: 20px;
            /* Space above content */
        }

        .shadow-pink {
            box-shadow: 0 4px 8px rgba(211, 47, 47, 0.2);
            /* Pink shadow */
            border-radius: 10px;
            /* Rounded corners */
            padding: 20px;
            /* Add padding */
            background: rgb(39, 39, 75);
            /* Light pink background */
        }

        .shadow-pink h3 {
            margin-top: 0;
            /* Remove margin from heading */
        }

        @media (max-width: 768px) {
            #cardholder {
                display: block;
                /* Stack buttons vertically on small screens */
            }

            .card-link,
            .btn {
                display: block;
                /* Stack buttons */
                width: 100%;
                /* Full width */
                margin: 5px 0;
                /* Space between buttons */
            }
        }

        /* For Daily */
        .tab-content {
            padding: 20px;

            /* Light background color */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        .cat-heading {
            color: #333;
            /* Dark text color for heading */
            font-size: 24px;
            margin-bottom: 20px;
           text-decoration: underline;

        }

        .d-md-flex.align-items-start {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            /* Space between image and text */
        }

        .dailyhoroscope-content {
            margin-bottom: 20px;
        }

        .dailyhoroscope-content p {
            font-size: 16px;
            line-height: 1.6;
            color: white;
            /* Darker text color for content */
        }

        .shadow-pink {
            background-color: #fce4ec;
            /* Pink background */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .shadow-pink h3 {
            margin-top: 0;
            color: #d81b71f;
            /* Gold text color */
        }

        .shadow-pink .row {
            margin-top: 20px;
        }

        .shadow-pink .col-md-6 {
            padding: 10px;
        }

        .shadow-pink svg {
            width: 60px;
            height: 60px;
        }

        .shadow-pink p {
            font-size: 16px;
            margin: 10px 0;
        }

        .shadow-pink strong {
            color: #d81b71f;
            /* Gold text color for lucky details */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .d-md-flex.align-items-start {
                flex-direction: column;
            }

            .shadow-pink .col-md-6 {
                margin-top: 20px;
            }
        }

        /* General styles */
        .ds-head-populararticle {
            background: rgb(39, 39, 75);
            padding: 20px;
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: 2px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover,
        .btn.active {
            background-color: #f0f0f0;
            color: #333;
            border-color: #f0f0f0;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        /* Specific styles for the sections */
        .dailyhoroscope-content {
            padding: 20px;
            background: rgba(54, 0, 100, 0.9) !important;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .shadow-pink {
            padding: 20px;
            background-color: #f9f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }


        .shadow-pink h3 {
            margin-top: 0;
            color: #d81b71f;
        }

        .shadow-pink .row div {
            margin-bottom: 20px;
        }
    </style>

    <style>
        .ds-head-populararticle {
            background-color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-12,
        .col-md-12 {
            padding-right: 15px;
            padding-left: 15px;
        }

        .py-3 {
            padding: 1rem 0;
        }

        .nav {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .btn-tab {
            padding: 10px 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            background-color: #fff;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-tab:hover,
        .btn-tab.active {
            background-color: #f0f0f0;
            color: #fff;
            border-color: #f0f0f0;
        }

        .nav-link.active {
            background: rgba(54, 0, 100, 0.9) !important;
            color: #fff;
            border-color: #f0f0f0;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tab-pane {
            display: none;
            padding: 20px;
            background-color: #eb000000;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 27, 0.1);
        }

        .tab-pane.active {
            display: block;
        }

        .cat-heading {
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .d-md-flex {
            display: flex;
            align-items: start;
            gap: 20px;
        }

        .media-body {
            flex-grow: 1;
        }

        .dailyhoroscope-content {
            margin-bottom: 20px;
        }

        .shadow-pink {
            background: rgba(54, 0, 100, 0.9) !important;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            padding: 20px;
        }

        .bg-pink {
            background: rgba(54, 0, 100, 0.9) !important;
            padding: 10px;
        }

        .color-red {
            color: #d32f2f;
        }

        h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-item {
                margin-bottom: 10px;
            }
        }
    </style>




    <div class="astroway-menu pt-3 bg-pink">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-unstyled d-flex mb-3">


                        @foreach ($gethoroscopesign['recordList'] as $horoscopesign)
                            <li class="taurus">
                                <a href="{{ route('front.dailyHoroscope', ['horoscopeSignId' => $horoscopesign['id']]) }}"
                                    title="Taurus Daily Horoscope" class="text-decoration-none ">
                                    <div class="text-center mb-2 mb-md-0">
                                        <div class="icon border-0 bg-pink">
                                            <img src="/{{ $horoscopesign['image'] }}" alt="{{ $horoscopesign['name'] }}">
                                        </div>
                                        <span class="d-block icon-desc pt-0">{{ $horoscopesign['name'] }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="ds-head-populararticle bg-white cat-pages">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-12 mt-4">
                    <ul class="nav justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="btn-tab nav-link active" id="daily-tab" data-toggle="tab" href="#dailyData"
                                role="tab">Daily</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-tab nav-link" id="weekly-tab" data-toggle="tab" href="#weeklyData"
                                role="tab">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-tab nav-link" id="yearly-tab" data-toggle="tab" href="#yearlyData"
                                role="tab">Yearly</a>
                        </li>
                    </ul>
                    {{-- daily --}}
                    <div class="tab-content mt-4">
                        <div class="tab-pane fade show active" id="dailyData" role="tabpanel">
                            <h2 class="cat-heading mb-4">Free</h2>
                            <div class="d-md-flex align-items-start">
                                <img src="http://jdresearchcenter.com/public/storage/images/sign_61709054553.png"
                                    style="max-height: 140px" class="mr-md-3 mx-auto d-block" alt="Aries">
                                <div class="media-body">
                                    {{-- <div class="dailyhoroscope-content mt-3">
                                        <p>Free Aries Daily Horoscope</p>
                                        <p>This is your daily horoscope for Aries.</p>
                                    </div> --}}
                                    <div class="shadow-pink rounded-10">
                                        <div class="bg-pink">
                                            <h3 class="text-center font-weight-bold color-red py-2">Today’s Lucky Color and
                                                Number For Aries</h3>
                                        </div>
                                        <div class="px-3">
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <div class="my-3"><svg data-name="Group 31019"
                                                            xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                            viewBox="0 0 60 60">
                                                            <!-- SVG content here -->
                                                        </svg></div>
                                                    <p>Lucky Color For Today<br><strong>Red</strong></p>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <div class="my-3"><svg data-name="Group 31029"
                                                            xmlns="http://www.w3.org/2000/svg" width="58.271"
                                                            height="59.841" viewBox="0 0 58.271 59.841">
                                                            <!-- SVG content here -->
                                                        </svg></div>
                                                    <p>Lucky Number For Today<br><strong>5</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- weekly --}}
                        <div class="tab-pane fade" id="weeklyData" role="tabpanel">
                            <h2 class="cat-heading mb-4">Free Weekly Horoscope</h2>
                            <div class="d-md-flex align-items-start">
                                <img src="http://jdresearchcenter.com/public/storage/images/sign_61709054553.png"
                                    style="max-height: 140px" class="mr-md-3 mx-auto d-block" alt="Aries">
                                <div class="media-body">
                                    <div class="shadow-pink rounded-10">
                                        <div class="bg-pink">
                                            <h3 class="text-center font-weight-bold color-red py-2">Weekly's Lucky Color and
                                                Number For Aries</h3>
                                        </div>
                                        <div class="px-3">
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <div class="my-3"><svg data-name="Group 31019"
                                                            xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                            viewBox="0 0 60 60">
                                                            <!-- SVG content here -->
                                                        </svg></div>
                                                    <p>Lucky Color For week<br><strong>Red</strong></p>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <div class="my-3"><svg data-name="Group 31029"
                                                            xmlns="http://www.w3.org/2000/svg" width="58.271"
                                                            height="59.841" viewBox="0 0 58.271 59.841">
                                                            <!-- SVG content here -->
                                                        </svg></div>
                                                    <p>Lucky Number For week<br><strong>5</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- yearly --}}
                        <div class="tab-pane fade" id="yearlyData" role="tabpanel">
                            <h2 class="cat-heading mb-4">Free Yearly Horoscope, 2025
                            </h2>
                            <div class="d-md-flex align-items-start">
                                <img src="http://jdresearchcenter.com/public/storage/images/sign_61709054553.png"
                                    style="max-height: 140px" class="mr-md-3 mx-auto d-block" alt="Aries">
                                <div class="media-body">
                                    <div class="dailyhoroscope-content mt-3">
                                        <p>Health Remark :If today is the right day for new beginnings</p>
                                        <p>Relationship Remark :If today is the right day for new beginnings</p>
                                        <p>Travel Remark :If today is the right day for new beginnings</p>
                                        <p>Family Remark :If today is the right day for new beginnings</p>
                                        <p>Friends Remark :If today is the right day for new beginnings</p>
                                        <p>Finances Remark :If today is the right day for new beginnings</p>
                                        <p>Status Remark :If today is the right day for new beginnings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ds-head-populararticle bg-white cat-pages">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading text-center">Why Should You Check Your Horoscope Daily? </h2>
                    <p>If today is the right day for new beginnings? Or if this day will have opportunities or challenges in
                        store?</p>
                    <p>Every day is like a new page in the book of our life. While some days are for hustle, on some days
                        all
                        you need to do is take a back seat and let situations reveal their outcome. What if there is a way
                        from
                        which you can get clarity about your day ahead and know what needs to be done. The daily Horoscope
                        of an
                        individual is a prediction about what different situations in your life such as regarding career,
                        health, relationship, etc. are going to be like.</p>
                    <p>The position of celestial bodies like the Sun, the Moon, and planets change frequently and they often
                        enter into new Houses and Zodiac signs leaving the former ones. With this movement, the life
                        situations
                        of an individual also get affected.</p>
                    <p>Daily Horoscope is created by deeply analyzing the position and effect of the celestial bodies on a
                        particular day and how it affects different aspects of the life of an individual.</p>
                    <p>Your Daily Horoscope can help you decipher upcoming challenges and reveal opportunities coming
                        towards
                        you. You get better clarity about the roadblocks that are restricting you to get peace of mind and
                        success. These predictions give you greater confidence about your day ahead and help you steer your
                        life
                        in the right direction by making the right decisions.</p>
                </div>
            </div>
            <div class="mb-3">

                <div class="row pt-3">
                    <div class="col-12">
                        <div
                            class="bg-pink looks-1 d-flex p-2 py-3 p-sm-3 overflow-hidden position-relative flex-xlwrap flex-sm-wrap flex-md-nowrap">
                            <div
                                class="text-center d-flex font-weight-medium align-items-center w-100 px-sm-4 pr-2 pr-sm-5">
                                <div style="
                                color: aliceblue;
                            "
                                    class="px-2 w-100 px-lg-5 mx-lg-5">
                                    <span class="d-block font-30 heading-line">WILL YOU BE <span
                                            class="color-red">RICH</span>
                                        AND <span class="color-red">SUCCESSFUL</span> IN FUTURE?</span>
                                    <span class="d-none d-md-block font-22 mt-3 pt-1">Know what’s written in your
                                        stars!</span>
                                    <a href="#"
                                        style="
                                    color: black; background:white; "
                                        class="btn btn-chat px-3 px-sm-4 font-20 font-weight-semi-bold font-small-ms mt-3">Ask
                                        An Astrologer Now</a>
                                </div>
                            </div>
                            <div
                                class="looks-image ilook2 text-center position-relative align-items-center mr-md-3 mr-lg-4  w-100 justify-content-center">
                                <div class="looks-img-box position-relative">
                                    <img src="{{ asset('/assets/images/success-future.png') }}">
                                </div>
                            </div>
                            <span class="looks-circle size-2 tops position-absolute"></span>
                            <span class="looks-circle size-3 filled rights position-absolute"
                                style="margin-top:9%"></span>
                            <span class="looks-circle size-1 filled bottom-0 position-absolute d-none d-sm-block"
                                style="margin-left:11%"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $("#weeklypanel").on('click', function() {
                $('#weeklypanel').addClass("bg-red text-white");
                $('#weeklypanel').removeClass("bg-white color-red");
                $('#dailypanel').removeClass("bg-red text-white");
                $('#dailypanel').addClass("bg-white color-red");
                $('#yearlypanel').removeClass("bg-red text-white");
                $('#yearlypanel').addClass("bg-white color-red");
                $('#dailyData').removeClass("show active");
                $('#yearlyData').removeClass("show active");
                $('#weeklyData').addClass("show active");
            });

            $("#dailypanel").on('click', function() {
                $('#dailypanel').addClass("bg-red text-white");
                $('#dailypanel').removeClass("bg-white color-red");
                $('#weeklypanel').removeClass("bg-red text-white");
                $('#weeklypanel').addClass("bg-white color-red");
                $('#yearlypanel').removeClass("bg-red text-white");
                $('#yearlypanel').addClass("bg-white color-red");
                $('#weeklyData').removeClass("show active");
                $('#yearlyData').removeClass("show active");
                $('#dailyData').addClass("show active");
            });

            $("#yearlypanel").on('click', function() {
                $('#yearlypanel').addClass("bg-red text-white");
                $('#yearlypanel').removeClass("bg-white color-red");
                $('#weeklypanel').removeClass("bg-red text-white");
                $('#weeklypanel').addClass("bg-white color-red");
                $('#dailypanel').removeClass("bg-red text-white");
                $('#dailypanel').addClass("bg-white color-red");
                $('#weeklyData').removeClass("show active");
                $('#dailyData').removeClass("show active");
                $('#yearlyData').addClass("show active");
            });
        });
    </script> --}}

    <!-- Bootstrap JS dependencies (required for tabs) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
