@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\astrologers.css') }}">
    <script src="{{ asset('js/statusbutton.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
    <div class="container">
        <main class="main-content">
            {{-- <h1>Manage Astrologers</h1> --}}
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search Astrologer..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="{{ route('admin.Astrologer.addastrologer')}}" class="add-button">+ Add Astrologer</a>

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
                                <button class="status-button inactive" data-status="inactive">Inactive</button>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button view">View</a>
                                <a href="{{ route('admin.Astrologer.editastrologer')}}" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>

                        <!-- Add more astrologer items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <!-- Delete button Popup -->
    <div id="popupForm-delete" class="popup-overlay" style="display:none;">
        <div class="popup-box-delete">
            <span class="close-btn" onclick="closePopup3()">&times;</span>
            <h2>Do you want to delete this item ?</h2>
            <form>
                <div class="delete-buttons">
                    <button type="submit" class="yes-btn">Yes</button>
                    <button type="submit" class="no-btn" onclick="closePopup3()">No</button>

                </div>
            </form>
        </div>
    </div>
@endsection
