@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="{{ route('admin.team-management.addlist') }}" class="add-button">+ Add Member</a>
            </div>
            <section class="customer-list">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CONTACT NO</th>
                            <th>TEAM ROLE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>9717919135</td>
                            <td>New Role</td>
                            <td class="action-buttons">
                                <a href="{{ route('admin.team-management.editlist') }}" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>9717919135</td>
                            <td>Super Admin</td>
                            <td class="action-buttons">
                                <a href="{{ route('admin.team-management.editlist') }}" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>9717919135</td>
                            <td>Sub Admin</td>
                            <td class="action-buttons">
                                <a href="{{ route('admin.team-management.editlist') }}" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>

                        <!-- Add more customer items as needed -->
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
