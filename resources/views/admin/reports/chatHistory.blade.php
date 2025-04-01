@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\skills.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>

    <div class="container">
        <main class="main-content">
            {{-- <h1>Manage Astrologers</h1> --}}
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                {{-- <a href="#" class="add-button">+ Add Call</a> --}}
            </div>
            <section class="skill-list">
                <table class="skill-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USER</th>
                            <th>ASTROLOGER</th>
                            <th>CHAT TIME</th>
                            <th>TOTAL MIN</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>vishnu</td>
                            <td>29-03-2025 12:59 PM</td>
                            <td>15</td>
                            <td class="action-buttons">
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
