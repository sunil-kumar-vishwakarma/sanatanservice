<nav class="navbar">
    <div class="navbar-left">
        {{-- <button id="toggle-sidebar"><i class="fas fa-bars"></i></button> --}}
    </div>
    <div class="navbar-right">
        <div class="profile-dropdown">
            <button class="profile-btn">
                <img src="{{ asset('https://i.pinimg.com/474x/d0/93/2b/d0932b3ed34581f4f811626a242c4ce3.jpg') }}" alt="Profile">
                <span>{{ Auth::guard('admin')->user()->name }}</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <ul class="profile-dropdown-menu">
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const profileBtn = document.querySelector(".profile-btn");
    const profileDropdown = document.querySelector(".profile-dropdown-menu");

    // Profile Dropdown Toggle
    profileBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        profileDropdown.classList.toggle("show");
    });

    // Click outside to close dropdown
    document.addEventListener("click", function (e) {
        if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove("show");
        }
    });
});

</script>
<style>
    /* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #24007a;
    padding: 15px 20px;
    color: white;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    border-bottom: 2px solid #391098; /* Border on the right side */
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2); /* Box shadow to the right */
}

/* Profile Dropdown */
.profile-dropdown {
    position: relative;
    margin-right: 40px
}

.profile-btn {
    display: flex;
    align-items: center;
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 16px;
}

.profile-btn img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    margin-right: 8px;
}

.profile-btn i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

/* Dropdown Menu */
.profile-dropdown-menu {
    position: absolute;
    right: 0;
    top: 40px;
    background: white;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    display: none;
    min-width: 150px;
    padding: 5px 0;
}

.profile-dropdown-menu.show {
    display: block;
}

.profile-dropdown-menu li {
    padding: 25px 45px; */
    cursor: pointer;
    /* text-align: left; */
    margin-bottom: -18px;
}

.profile-dropdown-menu li button {
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    font-size: 14px;
    cursor: pointer;
}

.profile-dropdown-menu li:hover {
    /* background: #f4f4f4; */
}

</style>
