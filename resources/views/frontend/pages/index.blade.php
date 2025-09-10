<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanatan</title>
    <link rel="icon" href="frontendcss/images/sanatan-logo.png" />
    <link rel="stylesheet" href="frontendcss/style.css" />
  </head>

  <body>
    <header>
      <div class="header-container">
        <div>
          <a href="#" class="logo-section">
            <img src="frontendcss/images/sanatan-logo.png" alt="Logo" />
            <div class="site-title">
              <h1>SANATAN</h1>
              <small>Personalized Wisdom for Modern Life</small>
            </div>
          </a>
        </div>

        <div class="app-buttons">
          <a href="https://play.google.com" target="_blank">
            <img
              src="frontendcss/images/playstore.png"
              alt="Google Play"
              class="store-btn" />
          </a>
          <a href="https://apple.com/app-store/" target="_blank">
            <img
              src="frontendcss/images/applestore.png"
              alt="App Store"
              class="store-btn" />
          </a>
        </div>
      </div>
    </header>

    

    <link rel="icon" href="frontendcss/images/sanatan-logo.png" />
    <link rel="stylesheet" href="css/home.css">

    <section class="hero">
      <div class="carousel">
        <div class="slides" id="slides">
          <div class="slide">
            <img src="frontendcss/images/slider1.jpg" alt="slider1" />
          </div>
          <div class="slide">
            <img src="frontendcss/images/zodiac-signs-1.jpg" alt="slider2" />
          </div>
          <div class="slide">
            <img src="frontendcss/images/slider.jpg" alt="slider3" />
          </div>
          <div class="slide">
            <img src="frontendcss/images/slider4.jpg" alt="slider4" />
          </div>
          <div class="slide">
            <img src="frontendcss/images/zodiac-signs-1.jpg" alt="slider2" />
          </div>
          <div class="slide">
            <img src="frontendcss/images/slider.jpg" alt="slider3" />
          </div>
          <div class="slide">
            <img src="frontendcss/images/slider4.jpg" alt="slider4" />
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
          <h2>ABOUT SANATAN</h2>
          <p>
            Sanatan is a modern way to connect with the timeless principles of
            Sanatan roots and the wisdom of Vedic astrology. Our platform
            bridges the origins of Vedic knowledge with today’s technology,
            making it simple, accessible, and relevant for everyone.<br /><br />

            Our motto is simple yet profound:<br />
            🌟 “Connecting the origins of Vedic wisdom with the power of modern
            technology.”<br /><br />

            We begin this journey by combining astrology with modern tools,
            helping you explore your horoscope, kundli, and panchang in a
            user-friendly way. With Sanatan AI, you receive daily spiritual
            guidance and clear insights into how your day will unfold.<br /><br />

            But Sanatan is more than just an app — it is a living bridge between
            ancient Sanatan knowledge and today’s lifestyle. By blending
            timeless wisdom with the clarity of technology, Sanatan makes
            spirituality a natural and enriching part of your daily life.
          </p>

          <!-- <a href="" class="view-btn">View Astrologer</a> -->
        </div>
        <div class="facts-image">
          <img
            src="frontendcss/images/horoscope-astrology-collage_23-2150719040 (1).jpg"
            alt="Astrology Wheel" />
        </div>
      </div>
    </section>

    <section class="facts-section">
      <div class="facts-container" id="panchang">
        <div class="facts-text">
          <h2>Discover Your Horoscope</h2>
          <ul>
            <li>
              Your horoscope is more than just a daily prediction — it’s a
              mirror of your journey through the stars.
            </li>
            <li>
              With Sanatan, you can explore daily, weekly, and yearly horoscopes
              personalized just for you.
            </li>
            <li>
              Understand the energies guiding your day, find clarity in
              challenges, and embrace opportunities with confidence.
            </li>
          </ul>
          <a href="#banner" class="view-btn">View Horoscope</a>
        </div>
        <div class="facts-image">
          <img
            src="frontendcss/images/zodiac-circle-with-horoscope-signs-fish-pisces-scorpio-aquarius-zodiak-aries-virgo-vector-illustration_.jpg"
            alt="Astrology Wheel" />
        </div>
      </div>
    </section>

    <section class="facts-section">
      <div class="facts-container">
        <div class="facts-text">
          <h2>Create Your Kundli</h2>
          <ul>
            <li>
              A Kundli (birth chart) is the blueprint of your life, crafted at
              the very moment you were born. It holds the secrets of your
              personality, strengths, challenges, and destiny.
            </li>
            <li>
              Sanatan helps you generate your Kundli instantly and in a simple,
              easy-to-understand format.
            </li>
            <li>
              Dive deeper into your life’s design, unlock spiritual insights,
              and even download a detailed Kundli PDF anytime.
            </li>
          </ul>
          <a href="#banner" class="view-btn">View Kundli</a>
        </div>
        <div class="facts-image">
          <img
            src="frontendcss/images/zodiac-wheel-space-background_52683-10930.jpg"
            alt="Astrology Wheel" />
        </div>
      </div>
    </section>

    <section class="facts-section">
      <div class="facts-container" id="panchang">
        <div class="facts-text">
          <h2>Explore the Panchang</h2>
          <ul>
            <li>
              The Panchang (Vedic calendar) is the ancient guide to time and
              harmony.
            </li>
            <li>
              It reveals auspicious timings, festivals, planetary movements, and
              daily spiritual rhythms like Shubh Muhurat and Rahu Kaal.
            </li>
            <li>
              With Sanatan, you don’t need to decode complex charts — the app
              shows you clear and accessible Panchang details to align your
              actions with the cosmic flow.
            </li>
          </ul>
          <a href="#banner" class="view-btn">View Panchang</a>
        </div>
        <div class="facts-image">
          <img src="frontendcss/images/panchang.jpg" alt="Astrology Wheel" />
        </div>
      </div>
    </section>

    <section class="banner" id="banner">
      <div class="banner-content">
        <h1>Sanatan Astrology App</h1>
        <p>
          Get personalized astrology guidance, daily horoscopes, and spiritual
          insights at your fingertips. Download our app today and connect with
          the wisdom of Sanatan Dharma.
        </p>
        <div class="app-buttons">
          <a href="https://play.google.com" target="_blank">
            <img
              src="frontendcss/images/playstore.png"
              alt="Google Play"
              class="store-btn" />
          </a>
          <a href="https://apple.com/app-store/" target="_blank">
            <img
              src="frontendcss/images/applestore.png"
              alt="App Store"
              class="store-btn" />
          </a>
        </div>
      </div>
      <div class="banner-image">
        <img src="frontendcss/images/mobile.jpg" alt="Mobile App" />
        <img src="frontendcss/images/mobile1.jpg" alt="Mobile App" />
      </div>
    </section>

    <section class="features">
      <a href="" class="feature-item">
        <img src="frontendcss/images/TodayPanchang1740225241.png" alt="Panchang" />
        <p>Today's Panchang</p>
      </a>

      <a href="" class="feature-item">
        <img src="frontendcss/images/FreeKundali1707194841.png" alt="Kundli" />
        <p>Janam Kundali</p>
      </a>

      <!-- <a href="{{ url('/kundali-matching') }}" class="feature-item">
            <img src="images/KundaliMatching1707194841.png" alt="Matching" />
            <p>Kundali Matching</p>
        </a> -->

      <a href="" class="feature-item">
        <img src="frontendcss/images/DailyHoroscope1711688425.png" alt="Horoscope" />
        <p>Free Daily Horoscope</p>
      </a>

      <!-- <a href="{{ url('/blog') }}" class="feature-item">
            <img src="images/Blog1740225241.png" alt="Blog" />
            <p>Astrology Blog</p>
        </a> -->
    </section>

    <section class="astro-desc">
      <div class="astro-txt">
        <h1>WHAT IS ASTROLOGY?</h1>
      </div>

      <div class="description">
        <h3>Astrology Is The Language Of The Universe</h3>
        <br />
        <ul>
          <li>
            <p>
              Astrology predictions are based on the position and movements of
              planets and celestial bodies in the Universe that impact our life
              quality. This can be studied by creating an offline or online
              horoscope of individuals. This affects not only the people but
              also controls the occurrence of certain events happening in the
              sublunar world.
            </p>
          </li>
          <br />
          <li>
            <p>
              Some may call it pseudo-science, and others call it predictive
              science. The science that is Astrology inspires people to know the
              various aspects of their life and take it in the right direction.
              From making life predictions on the basis of a detailed Kundali or
              telling you about the near future through daily, weekly and
              monthly horoscopes, Astrology is the medium through which you can
              get a glimpse of what the future will bring for you.
            </p>
          </li>
          <br />
          <li>
            <p>
              There is one aspect of offline and online Astrology prediction
              where the impacts of planetary transition can be seen. And when it
              is related to the Zodiacs, it happens as various planets cross the
              sectors of each zodiac in the sky. It impacts the natives of
              different zodiacs differently. And one more way is by analyzing
              the planetary position in various houses of one's Kundli.
            </p>
          </li>
          <br />
          <li>
            <p>
              Astrology reading is quite extensive. It is all about studying the
              9 planets placed in the twelve houses of one's Kundli and their
              impact on their life. These planets are the Sun, Moon, Mercury,
              Venus, Mars, Jupiter, Saturn, Rahu, and Ketu. Some of these
              planets positively impact human life, and others affect it
              adversely. It depends on their house placement.
            </p>
          </li>
          <br />

          <li>
            <p>
              Every house in the Kundli represents a different aspect of one's
              life. Similarly, Sun Signs, Moon Signs, Ascendants, and
              Descendants have their own significance. So it is not a confined
              subject, and the best way to know your future through the power of
              Astrology is to talk to an online Astrologer and get a detailed
              analysis of your online horoscope covering every aspect of your
              life.
            </p>
          </li>
          <br />
        </ul>

        <h3>Astrology Predictions And Its Benefits</h3>
        <br />

        <ul>
          <li>
            Offline and online Astrology predictions have the power to forecast
            the future by analyzing the positions of the planets as they move
            and studying their impact on your life.
          </li>
          <br />
          <li>
            An online horoscope is essentially a blueprint of your life that can
            help you gain clarity about the different aspects of your life, your
            personality and your future. Although there are several benefits of
            Astrological predictions, the best one remains timely guidance, and
            remedial suggestions to help avoid any unfavorable events coming
            your way. Or even if not eliminate them altogether, the offline and
            online Astro remedies can at least minimize their impacts. It is
            best if the guidance comes from the best Astrologer in India.
          </li>
          <br />
          <li>
            You can take advantage of staying a step ahead of time in every
            aspect of your life, be it love, money, career, marriage, family, or
            anything else. Online Astrology has the power to show you the right
            path that will lead you towards a successful and happy life.
          </li>
        </ul>
        <br />
      </div>
    </section>

    <section class="contact-section" id="contact">
      <h1 class="section-title">CONTACT US</h1>
     
      <div class="contact-container">
        
        <div class="contact-info">
          <h3>SANATAN</h3>
          <p>Personalized Wisdom for Modern Life</p>
          <p>Dr rajmohalla, University Area, Delhi 3098715</p>
          <p>&#128222; Customer Support: 8358055745</p>
          <p>&#9993; sanatanserviceinfo@gmail.com</p>
        </div>

        
        <div class="contact-form">
          <h3>Have any questions?</h3>
          <p>
            We are happy to help. Tell us your issue and we will get back to you
            at the earliest.
          </p>
          <br />
          <form>
            <input type="text" name="name" placeholder="Name" required />
            <input
              type="email"
              name="email"
              placeholder="Email Address"
              required />
            <textarea
              name="message"
              placeholder="Write your message here"
              required></textarea>

           
            <label style="color: #ddd; margin-bottom: 10px">
              <input type="checkbox" id="deleteCheck" /> Request Data Deletion
            </label>

            
            <input
              type="text"
              id="deleteReason"
              class="delete-reason"
              placeholder="Why do you want to delete your data?" />

            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </section>
    

    <footer class="site-footer">
      <div class="footer-content">
       
        <div class="footer-column">
          <h4>Panchang</h4>
          <ul>
            <li><a href="#banner">Today's Panchang</a></li>
          </ul>
          <h4>Astrology</h4>
          <ul>
            <li><a href="#banner">Kundali Matching</a></li>
            <li><a href="#">Free Janam Kundali</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>Horoscope</h4>
          <ul>
            <li><a href="#banner">Daily Horoscope</a></li>
            <li><a href="#banner">Weekly Horoscope</a></li>
            <li><a href="#banner">Yearly Horoscope</a></li>
          </ul>
        
        </div>
        <div class="footer-column">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#banner">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
          </ul>

          <h4>Policy</h4>
          <ul>
            <ul>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms Of Use</a></li>
            </ul>
          </ul>
        </div>
        <div class="footer-column">
          <h4>Download Our Apps</h4>
          <div class="dwnlod">
            <img
              src="frontendcss/images/playstore.png"
              alt="Google Play"
              class="store-btn" />
            <img
              src="frontendcss/images/applestore.png"
              alt="App Store"
              class="store-btn" />
          </div>
          <div class="social-icons">
            <a href="#"><img src="frontendcss/images/facebook.png" alt="Facebook" /></a>
            <a href="#"><img src="frontendcss/images/twitter.png" alt="Twitter" /></a>
            <a href="#"><img src="frontendcss/images/linkedin.png" alt="LinkedIn" /></a>
            <a href="#"><img src="frontendcss/images/instagram.png" alt="Instagram" /></a>
            <a href="#"><img src="frontendcss/images/youtube.png" alt="YouTube" /></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Copyright © 2025 SANATAN. All Rights Reserved</p>
      </div>
    </footer>

    <script src="frontendcss/script.js"></script>
  </body>
</html>
