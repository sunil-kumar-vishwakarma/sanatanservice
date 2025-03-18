@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <div class="container">
        <main class="main-content">
            <h1>Admin Dashboard</h1>
            {{-- 1st section --}}
            <section class="stats">
                <a href="#" class="stat-card"><i class="fas fa-users"></i> Total Users: 1200</a>
                <a href="#" class="stat-card"><i class="fas fa-chart-line"></i> Daily Visits: 800</a>
                <a href="#" class="stat-card"><i class="fas fa-star"></i> Active Horoscopes: 50</a>
                <a href="#" class="stat-card"><i class="fas fa-dollar-sign"></i> Monthly Revenue: $5000</a>
            </section>

            <br>

            {{-- 2nd section --}}
            <section class="stats">
                <a href="#" class="stat-card"><i class="fas fa-user-astronaut"></i> Total Astrologers: 500</a>
                <a href="#" class="stat-card"><i class="fas fa-user-tie"></i> Expert Astrologers: 200</a>
                <a href="#" class="stat-card"><i class="fas fa-moon"></i> Kundali Analyzed: 8000</a>
                <a href="#" class="stat-card"><i class="fas fa-star"></i> Active Predictions: 50</a>
            </section>

            <section class="dashboard-widgets">
                <div class="widget horoscope-widget">
                    <h2>♈ Horoscope Updates</h2>
                    <p>Latest horoscope predictions for all zodiac signs.</p>
                </div>
                <div class="widget users-widget">
                    <h2>👥 Users List</h2>
                    <ul>
                        <li>John Doe</li>
                        <li>Jane Smith</li>
                        <li>Michael Johnson</li>
                    </ul>
                </div>
                <div class="widget predictions-widget">
                    <h2>🔮 Recent Predictions</h2>
                    <ul>
                        <li>♈ Aries - Great opportunities ahead</li>
                        <li>♉ Taurus - Be cautious financially</li>
                        <li>♊ Gemini - Travel plans on the horizon</li>
                    </ul>
                </div>
            </section>
            <section class="user-list">
                <h2>👥 Users List</h2>
                                <div class="user-list-header">
                    <div class="user-list-column">Name</div>
                    <div class="user-list-column">Email</div>
                    <div class="user-list-column">Role</div>
                    <div class="user-list-column">Registered Date</div>
                </div>
                <ul>
                    <li>
                        <div class="user-list-item">
                            <div class="user-list-column">John Doe</div>
                            <div class="user-list-column">john.doe@example.com</div>
                            <div class="user-list-column">User</div>
                            <div class="user-list-column">2023-10-01</div>
                        </div>
                    </li>
                    <li>
                        <div class="user-list-item">
                            <div class="user-list-column">Jane Smith</div>
                            <div class="user-list-column">jane.smith@example.com</div>
                            <div class="user-list-column">Admin</div>
                            <div class="user-list-column">2023-10-02</div>
                        </div>
                    </li>
                    <li>
                        <div class="user-list-item">
                            <div class="user-list-column">Michael Johnson</div>
                            <div class="user-list-column">michael.johnson@example.com</div>
                            <div class="user-list-column">User</div>
                            <div class="user-list-column">2023-10-03</div>
                        </div>
                    </li>
                    <li>
                        <div class="user-list-item">
                            <div class="user-list-column">Emily Davis</div>
                            <div class="user-list-column">emily.davis@example.com</div>
                            <div class="user-list-column">User</div>
                            <div class="user-list-column">2023-10-04</div>
                        </div>
                    </li>
                    <li>
                        <div class="user-list-item">
                            <div class="user-list-column">Chris Lee</div>
                            <div class="user-list-column">chris.lee@example.com</div>
                            <div class="user-list-column">Admin</div>
                            <div class="user-list-column">2023-10-05</div>
                        </div>
                    </li>
                </ul>
            </section>
        </main>
    </div>
@endsection
