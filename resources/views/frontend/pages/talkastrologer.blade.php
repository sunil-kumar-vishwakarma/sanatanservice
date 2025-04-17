@extends('frontend.layout.app')
@section('title', 'Sanatan | Home ')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            /* background-color: rgb(34 0 59); */
            background-color: #12002c;
            color: white;
        }

        .chat-main-wrapper {
            padding: 30px;
            margin-top: 100px;
        }

        .chat-container-box {
            max-width: 1100px;
            margin: 0 auto;
        }

        .chat-top-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .chat-header-btn {
            /* background: linear-gradient(to top, rgba(54, 0, 100, 0.9), #000000); */
            background-color: #4b0082;
            color: white;
            font-weight: bold;
            padding: 10px 40px;
            border: none;
            cursor: pointer;
        }

        .chat-search-input,
        .chat-filter-dropdown {
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 240px;
        }

        .chat-card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 970px;
            margin: 0 auto;
        }

        .chat-astro-card {
            background-color: #aa0eb50f;
            border-radius: 10px;
            padding: 12px;
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: white;
            border: 1px solid white;
        }

        .chat-img-container {
            width: 70px;
            flex-shrink: 0;
        }

        .chat-img-style {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        .chat-category-label {
            font-size: 10px;
            margin-top: 4px;
            text-align: center;
        }

        .chat-astro-info {
            flex: 1;
            font-size: 12px;
            line-height: 1.3;
        }

        .chat-astro-info h3 {
            margin: 0 0 4px;
            font-size: 14px;
        }

        .chat-astro-info p {
            margin: 2px 0;
            font-size: 11px;
        }

        .chat-price-label {
            font-weight: bold;
            font-size: 12px;
        }

        .chat-price-label span {
            margin-left: 6px;
            background: white;
            color: #aa0eb5;
            padding: 1px 4px;
            border-radius: 4px;
            font-size: 10px;
        }

        .chat-call-buttons {
            position: absolute;
            bottom: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
            color: #aa0eb5;
            border: none;
            border-radius: 30px;
            font-size: 14px;
            padding: 4px 8px;
            cursor: pointer;
        }

        .chat-voice-call-btn,
        .chat-video-call-btn {
            background-color: white;
            color: #aa0eb5;
            border: none;
            border-radius: 20px;
            font-size: 13px;
            padding: 6px 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .chat-voice-call-btn:hover,
        .chat-video-call-btn:hover {
            background-color: #f5e8fa;
        }

        @media (max-width: 480px) {
            .chat-main-wrapper {
                padding: 20px !important;
            }

            .chat-top-controls {
                gap: 12px !important;
                align-items: stretch !important;
                flex-wrap: nowrap;
            }

            .chat-search-input,
            .chat-filter-dropdown,
            .chat-header-btn {
                width: 100% !important;
                padding: 14px !important;
                font-size: 22px !important;
            }

            .chat-card-grid {
                grid-template-columns: 1fr !important;
                padding: 0 10px !important;
            }

            .chat-astro-card {
                flex-direction: column !important;
                align-items: center !important;
                text-align: center !important;
                padding: 20px !important;
            }

            .chat-img-container {
                width: 90px !important;
            }

            .chat-img-style {
                width: 90px !important;
                height: 90px !important;
            }

            .chat-category-label {
                font-size: 10px;
                margin-top: 4px;
                text-align: center;
            }

            .chat-astro-info h3 {
                font-size: 16px !important;
            }

            .chat-astro-info p {
                font-size: 13px !important;
            }

            .chat-price-label {
                font-size: 14px !important;
            }

            .chat-price-label span {
                font-size: 12px !important;
                padding: 3px 6px !important;
            }

            .chat-call-buttons {
                position: static !important;
                margin-top: 12px !important;
                padding: 10px !important;
                font-size: 15px !important;
                text-align: center !important;
            }
        }
    </style>

    <div class="chat-main-wrapper">
        <div class="chat-container-box">
            <div class="chat-top-controls">
                <button class="chat-header-btn">Talk To Astrologer</button>
                <input type="text" placeholder="Search Astrologers" class="chat-search-input" />
                <select class="chat-filter-dropdown">
                    <option>Online</option>
                    <option>Low Experience</option>
                    <option>High Experience</option>
                    <option>Lower Price</option>
                    <option>High Price</option>
                </select>
                <select class="chat-filter-dropdown">
                    <option>All</option>
                    <option>Maritial life</option>
                    <option>Kids</option>
                    <option>Education</option>
                    <option>Finance & Business</option>
                    <option>Career & Jobs</option>
                    <option>Love & Relationship</option>
                </select>
            </div>

            <div class="chat-card-grid">
                <!-- Card 1 -->
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>
                <div class="chat-astro-card">
                    <div class="chat-img-container">
                        <img src="https://jdresearchcenter.com/public/storage/images/astrologer_1739789432.png"
                            alt="Astrologer" class="chat-img-style">
                        <p class="chat-category-label">Category: Finance & Business</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Kiran</h3>
                        <p>Career</p>
                        <p>English, Gujarati</p>
                        <p>Exp: 12 Years</p>
                        <p class="chat-price-label">$2/Min <span>FREE</span></p>
                    </div>
                    <div class="chat-call-buttons">
                        <button class="chat-voice-call-btn chat-now-btn"><i class="fa-solid fa-phone"></i></button>
                        <button class="chat-video-call-btn chat-now-btn"><i class="fa-solid fa-video"></i></button>
                    </div>
                </div>


            </div>
        </div>
    </div>


     <!-- Intake Form Modal -->
     <div id="astroIntakeModal" class="astro-intake-modal astro-intake-hidden">
        <div class="astro-intake-form-wrapper">
            <div class="astro-intake-header">
                <h3 class="astro-intake-title">Intake Form</h3>
                <button class="astro-intake-close-btn">&times;</button>
            </div>
            <form class="astro-intake-form-body">
                <div class="astro-intake-row">
                    <div class="astro-intake-group">
                        <label for="astroName">Name*</label>
                        <input type="text" id="astroName" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="astro-intake-group">
                        <label for="astroPhone">Phone No*</label>
                        <input type="tel" id="astroPhone" name="phone" placeholder="Enter phone number" required>
                    </div>
                </div>

                <div class="astro-intake-row">
                    <div class="astro-intake-group">
                        <label for="astroGender">Gender*</label>
                        <select id="astroGender" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="astro-intake-group">
                        <label for="astroBirthdate">Birthdate*</label>
                        <input type="date" id="astroBirthdate" name="birthdate" required>
                    </div>
                </div>

                <div class="astro-intake-row">
                    <div class="astro-intake-group">
                        <label for="astroBirthtime">Birthtime*</label>
                        <input type="time" id="astroBirthtime" name="birthtime" required>
                    </div>
                    <div class="astro-intake-group">
                        <label for="astroBirthplace">Birthplace*</label>
                        <input type="text" id="astroBirthplace" name="birthplace" placeholder="Enter birthplace"
                            required>
                    </div>
                </div>

                <div class="astro-intake-row">
                    <div class="astro-intake-group">
                        <label for="astroMaritalStatus">Marital Status*</label>
                        <select id="astroMaritalStatus" name="maritalStatus" required>
                            <option value="" disabled selected>Select status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="astro-intake-group">
                        <label for="astroOccupation">Occupation*</label>
                        <input type="text" id="astroOccupation" name="occupation" placeholder="Enter occupation"
                            required>
                    </div>
                </div>

                <div class="astro-intake-row">
                    <div class="astro-intake-group astro-intake-full">
                        <label for="astroTopic">Topic Of Concern*</label>
                        <input type="text" id="astroTopic" name="topic" placeholder="e.g. Love, Career..."
                            required>
                    </div>
                </div>
                <div class="astro-intake-row">
                    <button type="submit" class="astro-intake-start-btn">Start</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Intake Form Modal */
        .astro-intake-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.742);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
            transform: translateY(-20px);
        }

        .astro-intake-modal:not(.astro-intake-hidden) {
            opacity: 1;
            margin-top: 25px;
            visibility: visible;
            transform: translateY(0);
        }

        .astro-intake-form-wrapper {
            background: linear-gradient(135deg, #2e1366, #1a0b3a, #0d0618);
            /* Dark purple background */
            color: #fff;
            /* White text color */
            padding: 20px;
            /* Reduced padding */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            position: relative;
        }

        .astro-intake-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            /* Reduced margin */
        }

        .astro-intake-title {
            margin: 0;
            font-size: 20px;
            /* Reduced font size */
            font-weight: bold;
        }

        .astro-intake-close-btn {
            border: none;
            background: none;
            font-size: 20px;
            font-weight: bold;
            /* Reduced font size */
            cursor: pointer;
            color: #fff;
        }

        .astro-intake-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            /* Reduced margin */
        }

        .astro-intake-group {
            flex: 1;
            margin-right: 15px;
            /* Reduced margin */
        }

        .astro-intake-group:last-child {
            margin-right: 0;
        }

        .astro-intake-group astro-intake-full {
            flex: 100%;
        }

        .astro-intake-group label {
            display: block;
            margin-bottom: 3px;
            /* Reduced margin */
            font-size: 14px;
            /* Reduced font size */
        }

        .astro-intake-group input,
        .astro-intake-group select {
            width: 100%;
            padding: 8px;
            /* Reduced padding */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            /* Reduced font size */
        }

        .astro-intake-start-btn {
            width: 100%;
            padding: 8px;
            /* Reduced padding */
            background: #cb5500;
            /* Yellow background color */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            /* Reduced font size */
        }

        .astro-intake-start-btn:hover {
            background: #d55a02;
            /* Darker yellow on hover */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const intakeModal = document.getElementById('astroIntakeModal');
            const intakeCloseBtn = document.querySelector('.astro-intake-close-btn');
            const chatNowBtns = document.querySelectorAll('.chat-now-btn');

            // Function to open the form
            function openForm() {
                intakeModal.classList.remove('astro-intake-hidden');
            }

            // Function to close the form
            function closeForm() {
                intakeModal.classList.add('astro-intake-hidden');
            }

            // Open the form when any button with the class 'chat-now-btn' is clicked
            chatNowBtns.forEach(btn => {
                btn.addEventListener('click', openForm);
            });

            // Close the form when the close button is clicked
            intakeCloseBtn.addEventListener('click', closeForm);

            // Close the form when clicking outside the form
            intakeModal.addEventListener('click', function(event) {
                if (event.target === intakeModal) {
                    closeForm();
                }
            });
        });
    </script>
@endsection
