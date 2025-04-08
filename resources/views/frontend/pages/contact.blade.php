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
            text-align: center;
            padding: 50px 20px;

        }
        .section-title {
            font-size: 28px;
            font-weight: bold;
            margin-left: 3%;
        }
        .underline {
            width: 80px;
            height: 3px;
            background-color: lightblue;
            margin: 10px auto 30px;


        }
        .contact-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            background-color: #4b0082;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            margin: auto;
        }
        .contact-info {
            flex: 1;
            text-align: left;
            font-size: x-large;
        }
        .contact-form {
            flex: 1;
            text-align: left;
            font-size: x-large;
        }
        .contact-form form {
            display: flex;
            flex-direction: column;
        }
        .contact-form input, .contact-form textarea {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }
        .contact-form button {
            background-color: #ff4d4d;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 27px;
        }
        .contact-form button:hover {
            background-color: #cc0000;
        }

           /* footer */

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
        <h2 class="section-title">CONTACT US</h2>
        <div class="underline" style="margin-left: 43%;"></div>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Sanatan</h3>
                <p>Consult Online Astrologers Anytime</p>
                <p>Dr rajmohalla, University Area, Delhi 3098715</p>
                <p>&#128222; Customer Support: 8358055777</p>
                <p>&#9993; sanatan@gmail.com</p>
            </div>
            <div class="contact-form">
                <h3>Have any questions?</h3>
                <p>We are happy to help. Tell us your issue and we will get back to you at the earliest.</p>
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

