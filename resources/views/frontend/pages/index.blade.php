@extends('frontend.layout.app')
@section('title', 'Sanatan | Home ')
@section('content')


    <link rel="icon" href="assets/images/sanatan-logo.png" />
    <link rel="stylesheet" href="css/home.css">

    <!-- Hero Section -->
    <section class="hero">
        <div class="carousel">
            <div class="slides" id="slides">
                <div class="slide">
                    <img src="assets/images/slider1.jpg" alt="slider1" />
                </div>
                <div class="slide">
                    <img src="assets/images/zodiac-signs-1.jpg" alt="slider2" />
                </div>
                <div class="slide">
                    <img src="assets/images/slider.jpg" alt="slider3" />
                </div>
                <div class="slide">
                    <img src="assets/images/slider4.jpg" alt="slider4" />
                </div>
                <div class="slide">
                    <img src="assets/images/zodiac-signs-1.jpg" alt="slider2" />
                </div>
                <div class="slide">
                    <img src="assets/images/slider.jpg" alt="slider3" />
                </div>
                <div class="slide">
                    <img src="assets/images/slider4.jpg" alt="slider4" />
                </div>
            </div>

            <div class="nav-buttons">
                <button onclick="prevSlide()">❮</button>
                <button onclick="nextSlide()">❯</button>
            </div>

            <div class="dots" id="dots"></div>
        </div>
    </section>

    <!-- Facts Section -->
    <section class="facts-section">
        <div class="facts-container">
            <div class="facts-text">
                <h2>FASCINATING FACTS ABOUT <br><span>ASTROLOGY</span></h2>
                <ul>
                    <li>Ancient Origins - Astrology dates back to Babylonian times, around 2,400 years ago.</li>
                    <li>Zodiac Signs & the Sun’s Path - The 12 zodiac signs follow the Sun’s movement across the sky.
                    </li>
                    <li>Horoscopes Are Based on Birth Charts - They are created using birth time, date, and location.
                    </li>
                    <li>Western vs. Vedic Astrology - Western astrology follows seasons, while Vedic follows
                        constellations.</li>
                </ul>
                <a href="{{ route('talkastrologer') }}" class="view-btn">View Astrologer</a>
            </div>
            <div class="facts-image">
                <img src="assets/images/horoscope-astrology-collage_23-2150719040 (1).jpg" alt="Astrology Wheel">
            </div>
        </div>
    </section>


    <section class="facts-section">
        <div class="facts-container" id="panchang">
            <div class="facts-text">
                <h2>FASCINATING FACTS ABOUT <br><span>ASTROLOGY</span></h2>
                <ul>
                    <li>Ancient Origins - Astrology dates back to Babylonian times, around 2,400 years ago.</li>
                    <li>Zodiac Signs & the Sun’s Path - The 12 zodiac signs follow the Sun’s movement across the sky.
                    </li>
                    <li>Horoscopes Are Based on Birth Charts - They are created using birth time, date, and location.
                    </li>
                    <li>Western vs. Vedic Astrology - Western astrology follows seasons, while Vedic follows
                        constellations.</li>
                </ul>
                <a href="{{ route('front.getPanchang') }}" class="view-btn">View Panchang</a>
            </div>
            <div class="facts-image">
                <img src="assets/images/zodiac-circle-with-horoscope-signs-fish-pisces-scorpio-aquarius-zodiak-aries-virgo-vector-illustration_.jpg"
                    alt="Astrology Wheel">
            </div>
        </div>
    </section>


    <section class="facts-section">
        <div class="facts-container">
            <div class="facts-text">
                <h2>FASCINATING FACTS ABOUT <br><span>ASTROLOGY</span></h2>
                <ul>
                    <li>Ancient Origins - Astrology dates back to Babylonian times, around 2,400 years ago.</li>
                    <li>Zodiac Signs & the Sun’s Path - The 12 zodiac signs follow the Sun’s movement across the sky.
                    </li>
                    <li>Horoscopes Are Based on Birth Charts - They are created using birth time, date, and location.
                    </li>
                    <li>Western vs. Vedic Astrology - Western astrology follows seasons, while Vedic follows
                        constellations.</li>
                </ul>
                <a href="{{ route('front.astrologers.horoScope') }}" class="view-btn">View Horoscope</a>
            </div>
            <div class="facts-image">
                <img src="assets/images/zodiac-wheel-space-background_52683-10930.jpg" alt="Astrology Wheel">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="actions">
        <a href="{{ url('/talkastrologer') }}" class="action-btn">
            <i class="fa-solid fa-phone-volume"></i> Talk To Astrologer
        </a>
        <a href="{{ url('/astrologer-chat-list') }}" class="action-btn">
            <i class="fa-solid fa-comments"></i> Chat With Astrologer
        </a>
    </section>


    <section class="features">
        <a href="{{ url('/panchang') }}" class="feature-item">
            <img src="{{ asset('assets/images/TodayPanchang1740225241.png') }}" alt="Panchang" />
            <p>Today's Panchang</p>
        </a>

        <a href="{{ url('/kundali') }}" class="feature-item">
            <img src="{{ asset('assets/images/FreeKundali1707194841.png') }}" alt="Kundli" />
            <p>Janam Kundali</p>
        </a>

        <a href="{{ url('/kundali-matching') }}" class="feature-item">
            <img src="{{ asset('assets/images/KundaliMatching1707194841.png') }}" alt="Matching" />
            <p>Kundali Matching</p>
        </a>

        <a href="{{ url('/horoscopes') }}" class="feature-item">
            <img src="{{ asset('assets/images/DailyHoroscope1711688425.png') }}" alt="Horoscope" />
            <p>Free Daily Horoscope</p>
        </a>

        <a href="{{ url('/blog') }}" class="feature-item">
            <img src="{{ asset('assets/images/Blog1740225241.png') }}" alt="Blog" />
            <p>Astrology Blog</p>
        </a>
    </section>


    <!-- Astrologers Section -->
    <section class="Astrologers">
        <div class="astro-txt">
            <h1>OUR ASTROLOGERS</h1>
            <p>Get in touch with the best Online Astrologers, anytime & anywhere!</p>
        </div>
        <div class="astro-slider-wrapper">
            <button class="astro-arrow left" onclick="slideAstrologers('left')">&#10094;</button>

            <div class="astrologer-grid" id="astroSlider">
                <a href="/astrologerdetailspage" class="astro-card">
                    <img src="assets/images/astro1.png" alt="Astrologer 1" />
                    <div class="astro-info">
                        <h4>Astrologer Priya</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <a href="/astrologerdetailspage" class="astro-card">
                    <img src="assets/images/astro2.png" alt="Astrologer 2" />
                    <div class="astro-info">
                        <h4>Astrologer Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <a href="/astrologerdetailspage" class="astro-card">
                    <img src="assets/images/astro3.png" alt="Astrologer 3" />
                    <div class="astro-info">
                        <h4>Astrologer Vishnu</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <!-- Repeat for remaining astrologers -->
                <a href="/astrologerdetailspage" class="astro-card">
                    <img src="assets/images/astro4.png" alt="Astrologer 4" />
                    <div class="astro-info">
                        <h4>Astrologer Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>
                <a href="/astrologerdetailspage" class="astro-card">
                    <img src="assets/images/astro4.png" alt="Astrologer 4" />
                    <div class="astro-info">
                        <h4>Astrologer Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>
                <a href="/astrologerdetailspage" class="astro-card">
                    <img src="assets/images/astro4.png" alt="Astrologer 4" />
                    <div class="astro-info">
                        <h4>Astrologer Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <!-- Add more <a href="#">...</a> blocks for other astrologers as needed -->

                <button class="astro-arrow right" onclick="slideAstrologers('right')">&#10095;</button>
            </div>
        </div>
    </section>


    <!-- Pandit ji Section -->
    {{-- <section class="Astrologers">
        <div class="astro-txt">
            <h1>OUR PANDIT'S</h1>
            <p>Get in touch with the best Online pandits, anytime & anywhere!</p>
        </div>
        <div class="astro-slider-wrapper">
            <button class="astro-arrow left" onclick="slidePandit('left')">&#10094;</button>

            <div class="astrologer-grid" id="panditSlider">
                <a href="#" class="astro-card">
                    <img src="assets/images/astro1.png" alt="Pandit 1" />
                    <div class="astro-info">
                        <h4>Pandit Durgesh</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="astro-card">
                    <img src="assets/images/astro2.png" alt="Pandit 2" />
                    <div class="astro-info">
                        <h4>Pandit Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="astro-card">
                    <img src="assets/images/astro3.png" alt="Pandit 3" />
                    <div class="astro-info">
                        <h4>Pandit Vishnu</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <!-- Repeat for remaining astrologers -->
                <a href="#" class="astro-card">
                    <img src="assets/images/astro4.png" alt="Pandit 4" />
                    <div class="astro-info">
                        <h4>Pandit Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="astro-card">
                    <img src="assets/images/astro4.png" alt="Pandit 4" />
                    <div class="astro-info">
                        <h4>Pandit Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>
                <a href="#" class="astro-card">
                    <img src="assets/images/astro4.png" alt="Pandit 4" />
                    <div class="astro-info">
                        <h4>Pandit Raj</h4>
                        <small>Reviews: 0</small>
                        <div class="rating">
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                            <i class="far fa-star empty-star"></i>
                        </div>
                    </div>
                </a>

                <!-- Add more <a href="#">...</a> blocks for other astrologers as needed -->

                <button class="astro-arrow right" onclick="slidePandit('right')">&#10095;</button>
            </div>
        </div>
    </section> --}}



    <!-- Astro Section -->
    <section class="astro-section">
        <div class="astro-txt">
            <h1>ASTROLOGY VIDEOS</h1>
        </div>

        <div class="videos-container">
            <a href="https://www.youtube.com/watch?v=VIDEO_ID1" target="_blank" class="video-card">
                <div class="video-thumbnail">
                    <img src="assets/images/coverImage_1117090536581709053658.png" alt="Ram Siya Ram" />
                    {{-- <img class="play-icon" src="" alt="Play" /> --}}
                    <img class="play-icon" src="assets/images/youtube.png" alt="YouTube Play Icon" />

                </div>
                <p class="video-title">Ram Siya Ram</p>
            </a>

            <a href="https://www.youtube.com/watch?v=VIDEO_ID2" target="_blank" class="video-card">
                <div class="video-thumbnail">
                    <img src="assets/images/coverImage_1317402258871740225887.png" alt="Daily Horoscope" />
                    <img class="play-icon" src="assets/images/youtube.png" alt="YouTube Play Icon" />
                </div>
                <p class="video-title">Daily Horoscope</p>
            </a>

            <a href="https://www.youtube.com/watch?v=VIDEO_ID3" target="_blank" class="video-card">
                <div class="video-thumbnail">
                    <img src="assets/images/coverImage_1117090536581709053658.png" alt="Horoscope Today" />
                    <img class="play-icon" src="assets/images/youtube.png" alt="YouTube Play Icon" />
                </div>
                <p class="video-title">Horoscope Today | January 23, 2024</p>
            </a>
        </div>
    </section>


    <!-- Blog Section -->
    <section class="blog-section">
        <div class="astro-txt">
            <h1>OUR BLOG</h1>
            <p>
                Delve deeper into the world of Astrology, Psychic Reading & more with insightful articles and latest
                updates.
            </p>
        </div>

        <div class="blog-cards">
            <div class="blog-card">
                <img src="assets/images/blog1.jpg" alt="Blog 1" />
                <div class="blog-content">
                    <h4>Zodiac Signs man clingy in Romance</h4>
                    <h3>Zodiac Signs man are clingy in Romance</h3>
                    <p>Have you ever dated someone who just couldn’t give you...</p>
                    <a href="/blogDetailspage">Read More ➭</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="assets/images/blog2.jpg" alt="Blog 2" />
                <div class="blog-content">
                    <h4>5 Zodiac Signs That Are Born Clever</h4>
                    <h3>5 Zodiac Signs That Are Born Clever</h3>
                    <p>Have you ever wondered why some people seem to be...</p>
                    <a href="/blogDetailspage">Read More ➭</a>
                </div>
            </div>

            <div class="blog-card">
                <img src="assets/images/blog3.jpg" alt="Blog 3" />
                <div class="blog-content">
                    <h4>Signs Connection in Relationship</h4>
                    <h3>Connection In Relationships Signs</h3>
                    <p>You might understand this need for touch if you’re a Taurus or know one...</p>
                    <a href="/blogDetailspage">Read More ➭</a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="astro-txt">
            <h1>SANATAN NEWS</h1>
        </div><br>

        <div class="news-cards">
            <a href="https://www.ndtv.com/" target="_blank" class="publisher-item">
                <div class="news-card">
                    <img src="assets/images/softwarehouse.png" alt="News 1" />
                    <p>
                        Stay updated with the latest astrological insights zodiac predictions.
                        Explore how celestial movements influence daily life.
                    </p>
                </div>
            </a>

            <a href="https://www.abplive.com/" target="_blank" class="publisher-item">
                <div class="news-card">
                    <img src="assets/images/indiatv.png" alt="News 2" />
                    <p>
                        Stay updated with the latest astrological insights zodiac predictions.
                        Explore how celestial movements influence daily life.
                    </p>
                </div>
            </a>

            <a href="https://www.abplive.com/" target="_blank" class="publisher-item">
                <div class="news-card">
                    <img src="assets/images/astroscrience.png" alt="News 3" />
                    <p>
                        Stay updated with the latest astrological insights zodiac predictions.
                        Explore how celestial movements influence daily life.
                    </p>
                </div>
            </a>
        </div>
    </section>




    <!-- Astro Desc Section -->
    <section class="astro-desc">
        <div class="astro-txt">
            <h1>WHAT IS ASTROLOGY?</h1>
        </div>

        <div class="description">
            <h3>Astrology Is The Language Of The Universe</h3><br>
            <ul>
                <li>
                    <p>Astrology predictions are based on the position and movements of planets and celestial bodies in
                        the
                        Universe that impact our life quality. This can be studied by creating an offline or online
                        horoscope of individuals. This affects not only the people but also controls the occurrence of
                        certain events happening in the sublunar world.</p>
                </li><br>
                <li>
                    <p>Some may call it pseudo-science, and others call it predictive science. The science that is
                        Astrology inspires people to know the various aspects of their life and take it in the right
                        direction. From making life predictions on the basis of a detailed Kundali or telling you about
                        the
                        near future through daily, weekly and monthly horoscopes, Astrology is the medium through which
                        you
                        can get a glimpse of what the future will bring for you.</p>
                </li><br>
                <li>
                    <p>There is one aspect of offline and online Astrology prediction where the impacts of planetary
                        transition can be seen. And when it is related to the Zodiacs, it happens as various planets
                        cross
                        the sectors of each zodiac in the sky. It impacts the natives of different zodiacs differently.
                        And
                        one more way is by analyzing the planetary position in various houses of one's Kundli.</p>
                </li><br>
                <li>
                    <p>Astrology reading is quite extensive. It is all about studying the 9 planets placed in the twelve
                        houses of one's Kundli and their impact on their life. These planets are the Sun, Moon, Mercury,
                        Venus, Mars, Jupiter, Saturn, Rahu, and Ketu. Some of these planets positively impact human
                        life,
                        and others affect it adversely. It depends on their house placement.</p>
                </li><br>

                <li>
                    <p>Every house in the Kundli represents a different aspect of one's life. Similarly, Sun Signs, Moon
                        Signs, Ascendants, and Descendants have their own significance. So it is not a confined subject,
                        and
                        the best way to know your future through the power of Astrology is to talk to an online
                        Astrologer
                        and get a detailed analysis of your online horoscope covering every aspect of your life.</p>
                </li><br>
            </ul>

            <h3>Astrology Predictions And Its Benefits</h3><br>

            <ul>
                <li>Offline and online Astrology predictions have the power to forecast the future by analyzing the
                    positions of the planets as they move and studying their impact on your life.</li><br>
                <li>An online horoscope is essentially a blueprint of your life that can help you gain clarity about the
                    different aspects of your life, your personality and your future. Although there are several
                    benefits of Astrological predictions, the best one remains timely guidance, and remedial suggestions
                    to help avoid any unfavorable events coming your way. Or even if not eliminate them altogether, the
                    offline and online Astro remedies can at least minimize their impacts. It is best if the guidance
                    comes from the best Astrologer in India.</li><br>
                <li>You can take advantage of staying a step ahead of time in every aspect of your life, be it love,
                    money, career, marriage, family, or anything else. Online Astrology has the power to show you the
                    right path that will lead you towards a successful and happy life.</li>
            </ul><br>
        </div>
    </section>

    <!-- Accordion Section -->
    <section class="accordion-section">
        <div class="astro-txt">
            <h1>WHY SANATAN ?</h1>
            <p>One of the best online Astrology platforms to connect with experienced and verified Astrologers</p>
        </div><br>

        <div class="accordion-container">
            <div class="accordion-item">
                <button class="accordion-btn">Verified Astrologers <span><i class="fas fa-chevron-down icon"
                            style="
                    float: inline-end;
                "></i></span></button>
                <div class="accordion-content">
                    <p>We ensure all astrologers on the platform are highly experienced and thoroughly verified to
                        provide you with accurate guidance.</p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-btn">Ask An Astrologer Via Multiple Ways <span><i
                            class="fas fa-chevron-down icon"
                            style="
                    float: inline-end;
                "></i></span></button>
                <div class="accordion-content">
                    <p>Connect with astrologers via chat, call, or video at your convenience, anytime and from anywhere.
                    </p>
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-btn">100% Privacy Guaranteed <span><i class="fas fa-chevron-down icon"
                            style="
                    float: inline-end;
                "></i></span></button>
                <div class="accordion-content show">
                    <p>
                        At SANATAN, your privacy and security is our top priority. We adopt the highest security
                        standards
                        to keep your data and information secure. We ensure complete anonymity of your personal data,
                        and any other information that you share with our Astrologers. Our platform operates in a 100%
                        secure setting,
                        so you can connect online with Astrologers without worrying about anything.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <script src="home.js"></script>
@endsection
