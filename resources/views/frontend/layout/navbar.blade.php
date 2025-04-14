<link rel="stylesheet" href="css/home.css">

<header>
    <div class="header-container">

        <a href="{{ url('/') }}" class="logo-section">
            <img src="{{ asset('assets/images/sanatan-logo.png') }}" alt="Logo" />
            <div class="site-title">
                <h1>SANATAN</h1>
                <small>Consult Online Astrologers Anytime</small>
            </div>
        </a>


        <!-- Desktop buttons -->
        <div class="header-actions">
            <div class="drpdwn">
                <select class="language-dropdown">
                    <option>Select Language</option>
                    <option>English</option>
                    <option>Hindi</option>
                </select>
                <div class="login-dropdown">
                    <button class="user-btn">
                        <i class="fas fa-user"></i>Sign In <i class="fas fa-caret-down"></i>
                    </button>
                    <div class="login-menu">
                        <a href="{{ route('user.register') }}"><i class="fas fa-user"></i> Login/Signup</a>
                        <a href="{{ route('user.login') }}"><i class="fas fa-star"></i> Astrologer Login</a>
                    </div>
                </div>
            </div>
            {{-- <div class="toggle" id="toggleButton"> <i class="fa-solid fa-list"></i></div> --}}
            <div class="toggle" id="toggleMobileMenu">
                <i class="fa-solid fa-list"></i>
            </div>

        </div>
    </div>

    <nav id="menu" class="hidden">

        <div class="mobile-dropdowns">
            <select class="language-dropdown">
                <option>Select Language</option>
                <option>English</option>
                <option>Hindi</option>
            </select>
            <div class="login-dropdown">
                <button class="user-btn">
                    <i class="fas fa-user"></i>Sign In <i class="fas fa-caret-down"></i>
                </button>
                <div class="login-menu">
                    <a href="#"><i class="fas fa-user"></i> Login/Signup</a>
                    <a href="#"><i class="fas fa-star"></i> Astrologer Login</a>
                </div>
            </div>
        </div>

        <div class="column">
            <h3>ASTROLOGY ONLINE</h3>
            <ul>
                <li><a href="{{ route('talkastrologer') }}">Talk To Astrologer</a></li>
                <li><a href="{{ route('astrologer.chatlist') }}">Chat With Astrologer</a></li>
            </ul>
            <h3>CATEGORY</h3>
            <ul>
                <li><a href="{{ route('astrologer.chatlist') }}">Marital Life</a></li>
                <li><a href="{{ route('astrologer.chatlist') }}">Kids</a></li>
                <li><a href="{{ route('astrologer.chatlist') }}">Education</a></li>
                <li><a href="{{ route('astrologer.chatlist') }}">Finance & Business</a></li>
                <li><a href="{{ route('astrologer.chatlist') }}">Career & Job</a></li>
                <li><a href="{{ route('astrologer.chatlist') }}">Love & Relationship</a></li>
            </ul><br>
        </div>
        <div class="column">
            <h3>ASTROLOGY</h3>
            <ul>
                <li><a href="{{ route('front.kundaliMatch') }}">Kundali Matching</a></li>
                <li><a href="#">Free Janam Kundali</a></li>
            </ul><br>
            <h3>HOROSCOPE</h3>
            <ul>
                <li><a href="{{ route('front.astrologers.horoScope') }}">Daily Horoscope</a></li>
                <li><a href="{{ route('front.astrologers.horoScope') }}">Weekly Horoscope</a></li>
                <li><a href="{{ route('front.astrologers.horoScope') }}">Yearly Horoscope</a></li>
            </ul>
        </div>
        <div class="column">
            <h3>PANCHANG</h3>
            <ul>
                <li><a href="{{ route('front.getPanchang') }}">Today's Panchang</a></li>
            </ul><br>
            {{-- <h3>REPORT</h3>
            <ul>
                <li><a href="#">Get Report</a></li>
            </ul> --}}
        </div>
    </nav>
</header>
<style>
    .hidden {
        display: none !important;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById("toggleMobileMenu");
        const menu = document.getElementById("menu");

        toggleButton.addEventListener("click", function() {
            menu.classList.toggle("hidden");
        });
    });
</script>
