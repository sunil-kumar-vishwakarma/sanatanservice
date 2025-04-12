@extends('frontend.layout.app')
@section('title', 'Sanatan | Contact ')
@section('content')

    <style>
        /* body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: rgb(39, 39, 75);
                    color: white;
                } */
        .contact-section {
            padding: 60px 20px;
            background-color: #12002c;
        }

        .section-title {
            text-align: center;
            /* font-size: 2.5rem; */
            margin-bottom: 10px;
            color: #ffffff;
        }

        .underline {
            width: 80px;
            height: 4px;
            background-color: #ffbd59;
            margin: 0 auto 40px;
            border-radius: 2px;
        }

        .contact-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 1100px;
            margin: auto;
        }

        .contact-info,
        .contact-form {
            flex: 1 1 400px;
            background-color: #1e0f3c;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .contact-info h3,
        .contact-form h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #ffbd59;
        }

        .contact-info p
        {
            font-size: 1rem;
            line-height: 2.6;
            color: #dddddd;
        }

        .contact-form p {
            font-size: 1rem;
            line-height: 1.6;
            color: #dddddd;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
        }

        .contact-form input,
        .contact-form textarea {
            margin-bottom: 15px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
        }

        .contact-form textarea {
            resize: vertical;
            min-height: 120px;
        }

        .contact-form button {
            background-color: #cb5500;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #ea7500;
        }

        @media (max-width: 768px) {
            .section-title {
                /* font-size: 2rem; */
            }

            .contact-form,
            .contact-info {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                /* font-size: 1.6rem; */
            }

            .underline {
                width: 60px;
            }

            .contact-form input,
            .contact-form textarea {
                font-size: 0.95rem;
            }

            .contact-form button {
                font-size: 0.95rem;
            }
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
    <br><br><br>
    <section class="contact-section">
        <h1 class="section-title">CONTACT US</h1>
        <div class="underline"></div>
        <div class="contact-container">
            <div class="contact-info">
                <h3>SANATAN</h3>
                <p>Consult Online Astrologers Anytime</p>
                <p>Dr rajmohalla, University Area, Delhi 3098715</p>
                <p>&#128222; Customer Support: 8358055777</p>
                <p>&#9993; sanatan@gmail.com</p>
            </div>
            <div class="contact-form">
                <h3>Have any questions?</h3>
                <p>We are happy to help. Tell us your issue and we will get back to you at the earliest.</p>
                <br>
                <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <textarea placeholder="Write your message here" required name="message"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
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
