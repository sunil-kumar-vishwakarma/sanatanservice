@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\astrologers.css') }}">
    <script src="{{ asset('js/statusbutton.js') }}" defer></script>
    <div class="container">
        <main class="main-content">
            {{-- <h1>Manage Astrologers</h1> --}}
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search Astrologer..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                {{-- <a href="#" class="add-button">+ Add Blog</a> --}}
            </div>
            <section class="astrologer-list">
                <table class="astrologer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>CONTACT NO.</th>
                            <th>EMAIL</th>
                            <th>GENDER</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>Male</td>
                            <td>
                                <button class="status-button active" data-status="active">Active</button>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button delete">Unblock</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>Jane Smith</td>
                            <td>098-765-4321</td>
                            <td>jane.smith@example.com</td>
                            <td>Female</td>
                            <td>
                                <button class="status-button inactive" data-status="inactive">Inactive</button>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button delete">Unblock</a>
                            </td>
                        </tr>

                        <!-- Add more astrologer items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        <button disabled>« Previous</button>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">...</a>
        <button>Next »</button>
    </div>

    <style>
        .main-content {
            margin-top: 35px;
        }

        .astrologer-table th,
        .astrologer-table td {
            border-bottom: none;
        }

        .status-button {
            padding: 10px 15px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }

        .status-button.active {
            background-color: #28a745; /* Green */
        }

        .status-button.inactive {
            background-color: #dc3545; /* Red */
        }
    </style>

@endsection
