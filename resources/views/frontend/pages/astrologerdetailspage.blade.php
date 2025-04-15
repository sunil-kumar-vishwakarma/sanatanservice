@extends('frontend.layout.app')
@section('title', 'Sanatan | Home ')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(34 0 59);
            color: #fff;
        }

        .header {
            margin-top: 80px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            /* background-color: #4b0082; */
            background: linear-gradient(to bottom, #000000, #4b0073);
            border-bottom: 1px solid #fff;
            flex-wrap: wrap;
        }

        .user-info {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
        }


        .user-info img {
            border-radius: 50%;
            width: 130px;
            height: 130px;
            object-fit: fill;

        }

        .image-wrapper {
            position: relative;
            display: inline-block;
            /* margin-top: 15px; */
        }

        .verified-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #4caf50;
            color: white;
            border-radius: 50%;
            font-size: 18px;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }


        .details {
            text-align: left;
        }

        .info {
            border-top: 1px solid #fff;
            margin-top: 8px;
            /* White border */
        }


        .price {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .price button {
            background-color: #ffd700;
            color: #4b0082;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            width: 210px;
            transition: background-color 0.3s;
        }

        .price button:hover {
            background-color: #ffa500;
        }

        .content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #000;
            border-radius: 10px;
        }

        .specialization,
        .services,
        .qualification {
            margin-bottom: 20px;
        }

        .specialization li {
            list-style: none;
        }

        .schedule-progressbar {
            display: flex;
            justify-content: space-between;
            list-style: none;
            margin: 40px 0;
            padding: 0;
            position: relative;
        }

        .schedule-progressbar>li {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .schedule-progressbar>li:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 68px;
            /* vertically center with the dot */
            left: 50%;
            width: 100%;
            height: 2px;
            background-color: #65a9fd;
            z-index: 1;
        }

        .time-pill {
            border: 1px solid #65A9FD;
            color: black;
            font-size: 12px;
            background: #fff;
            padding: 5px 10px;
            border-radius: 15px;
            margin: 10px 20px;
            /* margin-bottom: 10px; */
            /* display: inline-block; */
        }


        .dot {
            display: inline-block;
            width: 16px;
            height: 16px;
            background-color: #65a9fd;
            border: 2px solid white;
            border-radius: 50%;
            position: relative;
            z-index: 2;
            margin: 10px auto 0;
        }

        .footer-review {
            text-align: center;
            padding: 20px;
            background-color: #4b0082;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .footer-review span {
            color: #65a9fd;
        }

        @media (max-width: 768px) {
            .user-info {
                display: flex;
                align-items: flex-start;
                gap: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .details {
                text-align: center;
            }

            .schedule-progressbar {
                /* flex-direction: column; */
                display: block;
                align-items: center;
                position: relative;
            }

            .schedule-progressbar>li:not(:last-child)::after {
                display: none;
            }

            .dot {
                display: none;
            }
            .info{
                margin-bottom: 20px;
            }

            .schedule-progressbar .time-pill {
                margin: 10px 80px;
            }
        }
    </style>
    </head>

    <body>

        <div class="header">
            <div class="user-info">
                <div class="image-wrapper">
                    <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739991615.png"
                        alt="Profile Picture" />
                    <span class="verified-badge"><i class="fas fa-check-circle"></i></span>
                </div>

                <div class="details">
                    <h2>Kiran</h2>
                    <p>Career</p>
                    <p>English, Gujarati</p>
                    <div class="info">
                        <p class="details-para">Reviews: 0 | Rating: <span class="rating1"><i class="far fa-star"></i><i
                                    class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                                    class="far fa-star"></i></span> | Exp: 2 Years</p>
                    </div>
                </div>
            </div>

            <div class="price">
                <button>Chat: $2/Min Free</button>
                <button>Audio Call: $2/Min Free</button>
                <button>Video Call: $5/Min Free</button>
            </div>
        </div>

        <div class="content">
            <div class="specialization">
                <h3>Specialization</h3>
                <ul>
                    <li>Career & Job</li>
                </ul>
            </div>

            <div class="services">
                <h3>About My Services</h3>
                <p>nhgbfvdsaz</p>
            </div>

            <div class="qualification">
                <h3>Experience & Qualification</h3>
                <p>I am a practicing Tarot Card Reader with an experience of more than 2 years now. I obtained my B.tech
                    degree from Hvdxc college</p>
            </div>

            <ul class="schedule-progressbar">
                <li class="active">
                    <p>Sunday<br>(April 20)</p>
                    <span class="dot"></span>
                    <p class="time-pill">2:30 AM</p>
                    <p class="time-pill">4:30 AM</p>
                </li>
                <li>
                    <p>Monday<br>(April 21)</p>
                    <span class="dot"></span>
                    <p class="time-pill">3:00 AM</p>
                    <p class="time-pill">5:00 AM</p>
                </li>
                <li>
                    <p>Tuesday<br>(April 22)</p>
                    <span class="dot"></span>
                    <p class="time-pill">3:00 AM</p>
                    <p class="time-pill">5:00 AM</p>
                </li>
                <li>
                    <p>Wednesday<br>(April 23)</p>
                    <span class="dot"></span>
                    <p class="time-pill">3:00 AM</p>
                    <p class="time-pill">5:00 AM</p>
                </li>
                <li>
                    <p>Thursday<br>(April 24)</p>
                    <span class="dot"></span>
                    <p class="time-pill">3:00 AM</p>
                    <p class="time-pill">5:00 AM</p>
                </li>
                <li>
                    <p>Friday<br>(April 25)</p>
                    <span class="dot"></span>
                    <p class="time-pill">3:00 AM</p>
                    <p class="time-pill">5:00 AM</p>
                </li>
                <li>
                    <p>Saturday<br>(April 26)</p>
                    <span class="dot"></span>
                    <p class="time-pill">3:00 AM</p>
                    <p class="time-pill">5:00 AM</p>
                </li>
            </ul>

        </div>

        <div class="footer-review">
            <p>Reviews: <span>0</span></p>
            <p>No Review Found</p>
        </div>

    @endsection
