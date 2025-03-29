<aside class="sidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <a href="#">
                <h1 class="logo-text">SANATAN</h1>
                {{-- <img src="{{ asset('assets/logo.jpg') }}" alt="Admin Panel Logo"> --}}
            </a>
        </div>

    </div>
    <ul class="sidebar-menu">
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="{{ request()->routeIs('admin.customers') ? 'active' : '' }}">
            <a href="{{ route('admin.customers') }}"><i class="fas fa-users"></i> Customers</a>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-user"></i> Astrologer <i class="fas fa-angle-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.block-astrologer') ? 'active' : '' }}">
                    <a href="{{ route('admin.block-astrologer') }}"><i class="fas fa-ban"></i> Block
                        Astrologers</a>
                </li>
                <li class="{{ request()->routeIs('admin.astrologers') ? 'active' : '' }}">
                    <a href="{{ route('admin.astrologers') }}"><i class="fas fa-user"></i> Manage
                        Astrologers</a>
                </li>
                <li class="{{ request()->routeIs('admin.pending-request') ? 'active' : '' }}">
                    <a href="{{ route('admin.pending-request') }}"><i class="fas fa-clock"></i> Pending Request</a>
                </li>
                <li class="{{ request()->routeIs('admin.review') ? 'active' : '' }}">
                    <a href="{{ route('admin.review') }}"><i class="fas fa-star"></i> Reviews</a>
                </li>

                <li class="{{ request()->routeIs('admin.skills') ? 'active' : '' }}">
                    <a href="{{ route('admin.skills') }}"><i class="fas fa-wrench"></i> Skills</a>
                </li>
                <li class="{{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories') }}"><i class="fas fa-layer-group"></i> Categories</a>
                </li>
                <li class="{{ request()->routeIs('admin.commission') ? 'active' : '' }}">
                    <a href="{{ route('admin.commission') }}"><i class="fas fa-percentage"></i> Commission Rate</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-star"></i> Horoscope <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">


                <li class="{{ request()->routeIs('admin.horoscope.daily') ? 'active' : '' }}">
                    <a href="{{ route('admin.horoscope.daily') }}"><i class="fas fa-calendar-day"></i> Daily Horoscope</a>
                </li>
                <li class="{{ request()->routeIs('admin.horoscope.weekly') ? 'active' : '' }}">
                    <a href="{{ route('admin.horoscope.weekly') }}"><i class="fas fa-calendar-week"></i> Weekly Horoscope</a>
                </li>
                <li class="{{ request()->routeIs('admin.horoscope.yearly') ? 'active' : '' }}">
                    <a href="{{ route('admin.horoscope.yearly') }}"><i class="fas fa-calendar-alt"></i> Yearly Horoscope</a>
                </li>
                <li class="{{ request()->routeIs('admin.horoscope.feedback') ? 'active' : '' }}">
                    <a href="{{ route('admin.horoscope.feedback') }}"><i class="fas fa-comments"></i> Horoscope Feedback</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-praying-hands"></i> Arti <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.arti.audio') ? 'active' : '' }}">
                    <a href="{{ route('admin.arti.audio') }}"><i class="fas fa-headphones"></i> Audio</a>
                </li>
                {{-- <li class="{{ request()->routeIs('admin.arti.pdf') ? 'active' : '' }}">
                    <a href="{{ route('admin.arti.pdf') }}"><i class="fas fa-file-pdf"></i> PDF</a>
                </li> --}}
            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-place-of-worship"></i> Temple <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.temple.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.temple.list') }}"><i class="fas fa-map-marked-alt"></i> List of Temples</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-broadcast-tower"></i> Live <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.live.arti') ? 'active' : '' }}">
                    <a href="{{ route('admin.live.arti') }}"><i class="fas fa-praying-hands"></i> Live Arti</a>
                </li>
                <li class="{{ request()->routeIs('admin.live.darshan') ? 'active' : '' }}">
                    <a href="{{ route('admin.live.darshan') }}"><i class="fas fa-place-of-worship"></i> Live Darshan</a>
                </li>
            </ul>
        </li>


        <li class="{{ request()->routeIs('admin.blog.list') ? 'active' : '' }}">
            <a href="{{ route('admin.blog.list') }}"><i class="fas fa-blog"></i> Blogs</a>
        </li>
        <li class="{{ request()->routeIs('admin.video.video') ? 'active' : '' }}">
            <a href="{{ route('admin.video.video') }}"><i class="fas fa-video"></i> Videos</a>
        </li>
        <li class="{{ request()->routeIs('admin.banner.banner') ? 'active' : '' }}">
            <a href="{{ route('admin.banner.banner') }}"><i class="fas fa-images"></i> Banner Management</a>
        </li>
        <li class="{{ request()->routeIs('admin.notifications.index') ? 'active' : '' }}">
            <a href="{{ route('admin.notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-headset"></i> Support Management <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.support-management.tickets') ? 'active' : '' }}">
                    <a href="{{ route('admin.support-management.tickets') }}"><i class="fas fa-ticket-alt"></i> Tickets</a>
                </li>
                <li class="{{ request()->routeIs('admin.support-management.FAQs') ? 'active' : '' }}">
                    <a href="{{ route('admin.support-management.FAQs') }}"><i class="fas fa-question-circle"></i> FAQs</a>
                </li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-wallet"></i> Earnings <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">

                <li class="{{ request()->routeIs('admin.earnings.withdrawalRequests') ? 'active' : '' }}">
                    <a href="{{ route('admin.earnings.withdrawalRequests') }}"><i class="fas fa-hand-holding-usd"></i> Withdrawal Requests</a>
                </li>

                <li class="{{ request()->routeIs('admin.earnings.withdrawalmethods') ? 'active' : '' }}">
                    <a href="{{ route('admin.earnings.withdrawalmethods') }}"><i class="fas fa-credit-card"></i> Withdrawal Methods</a>
                </li>

                <li class="{{ request()->routeIs('admin.earnings.walletHistory') ? 'active' : '' }}">
                    <a href="{{ route('admin.earnings.walletHistory') }}"><i class="fas fa-history"></i> Wallet History</a>
                </li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-chart-line"></i> Reports <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.reports.callHistory') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports.callHistory') }}"><i class="fas fa-phone-alt"></i> Call History</a>
                </li>
                <li class="{{ request()->routeIs('admin.reports.chatHistory') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports.chatHistory') }}"><i class="fas fa-comments"></i> Chat History</a>
                </li>
                <li class="{{ request()->routeIs('admin.reports.partnerWiseEarning') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports.partnerWiseEarning') }}"><i class="fas fa-money-bill-wave"></i> PartnerWise Earning</a>
                </li>
                <li class="{{ request()->routeIs('admin.reports.orderrequest') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports.orderrequest') }}"><i class="fas fa-list-alt"></i> Order Request</a>
                </li>
                <li class="{{ request()->routeIs('admin.reports.reportrequest') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports.reportrequest') }}"><i class="fas fa-flag"></i> Report Request</a>
                </li>
                <li class="{{ request()->routeIs('admin.reports.kundaliearning') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports.kundaliearning') }}"><i class="fas fa-hand-holding-heart"></i> Kundali Earnings</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-cogs"></i> Master Settings <i class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.master-setting.customerProfile') ? 'active' : '' }}">
                    <a href="{{ route('admin.master-setting.customerProfile') }}"><i class="fas fa-user"></i> Customer Profile</a>
                </li>
                <li class="{{ request()->routeIs('admin.master-setting.horoscopeSigns') ? 'active' : '' }}">
                    <a href="{{ route('admin.master-setting.horoscopeSigns') }}"><i class="fas fa-star"></i> Horoscope Signs</a>
                </li>
                <li class="{{ request()->routeIs('admin.master-setting.rechargeAmount') ? 'active' : '' }}">
                    <a href="{{ route('admin.master-setting.rechargeAmount') }}"><i class="fas fa-coins"></i> Recharge Amount</a>
                </li>
                <li class="{{ request()->routeIs('admin.master-setting.reportTypes') ? 'active' : '' }}">
                    <a href="{{ route('admin.master-setting.reportTypes') }}"><i class="fas fa-file-alt"></i> Report Type</a>
                </li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#"><i class="fas fa-users-cog"></i> Team Management <i
                    class="fas fa-chevron-down"></i></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('admin.team-management.role') ? 'active' : '' }}">
                    <a href="{{ route('admin.team-management.role') }}"><i class="fas fa-user-tag"></i> Team Role</a>
                </li>
                <li class="{{ request()->routeIs('admin.team-management.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.team-management.list') }}"><i class="fas fa-users"></i> Team List</a>
                </li>


            </ul>
        </li>

        <li class="{{ request()->routeIs('admin.g-setting.general') ? 'active' : '' }}">
            <a href="{{ route('admin.g-setting.general') }}"><i class="fas fa-sliders-h"></i> General Settings</a>
        </li>


        <li class="{{ request()->routeIs('admin.feedback') ? 'active' : '' }}">
            <a href="{{ route('admin.feedback') }}"><i class="fas fa-comment-dots"></i> Feedback</a>
        </li>

        <li class="{{ request()->routeIs('admin.page-management.index') ? 'active' : '' }}">
            <a href="{{ route('admin.page-management.index') }}"><i class="fas fa-envelope"></i>  Page Management</a>
        </li>
        <li class="{{ request()->routeIs('admin.contact.index') ? 'active' : '' }}">
            <a href="{{ route('admin.contact.index') }}"><i class="fas fa-file"></i> Contact Form</a>
        </li>
    </ul>
    <br>
    <br>
    <br>
</aside>
