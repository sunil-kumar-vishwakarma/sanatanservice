@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\astrologers.css') }}">
    <link rel="stylesheet" href="{{ asset('css\Astrologer\pending-request.css') }}">
    <script src="{{ asset('js\pendin-request.js') }}" defer></script>

    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search pendin request..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="#" class="add-button">+ Add Astrologer</a>
            </div>
            {{-- <h1>Pending Astrologer Requests</h1> --}}
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
                                <button class="status-button pending" data-status="pending">Pending</button>
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
                                <button class="status-button pending" data-status="pending">Pending</button>
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
        <a href="#">3 ...</a>
        <button>Next »</button>
    </div>
@endsection
