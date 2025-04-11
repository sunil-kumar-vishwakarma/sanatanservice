@extends('frontend.layout.app')
@section('title', 'Sanatan | Home ')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: rgb(34 0 59);
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
            background: linear-gradient(to top, rgba(54, 0, 100, 0.9), #000000);
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

        .chat-now-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: white;
            color: #aa0eb5;
            border: none;
            border-radius: 30px;
            font-size: 14px;
            padding: 4px 8px;
            cursor: pointer;
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

            .chat-now-btn {
                position: static !important;
                margin-top: 12px !important;
                width: 100% !important;
                padding: 10px !important;
                font-size: 15px !important;
                text-align: center !important;
            }
        }
    </style>

    <div class="chat-main-wrapper">
        <div class="chat-container-box">
            <div class="chat-top-controls">
                <button class="chat-header-btn">Chat With Astrologer</button>
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
                        <p class="chat-category-label">Category: Career & Job, Kids</p>
                    </div>
                    <div class="chat-astro-info">
                        <h3>Raj</h3>
                        <p>Relationship</p>
                        <p>English, Hindi</p>
                        <p>Exp: 10 Years</p>
                        <p class="chat-price-label">$5/Min <span>FREE</span></p>
                    </div>
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
                </div>

                <!-- Card 2 -->
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
                </div>

                <!-- Card 3 -->
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
                </div>

                <!-- Card 4 -->
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
                    <button class="chat-now-btn"><i class="fa-regular fa-comment"></i></button>
                </div>

            </div>
        </div>
    </div>

@endsection
