@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\astrologers.css') }}">
    <link rel="stylesheet" href="{{ asset('css\page-managment.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js/statusbutton.js') }}" defer></script>
    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script src="{{ asset('js\popupform.js') }}" defer></script>


    <div class="container">
        <main class="main-content">
            {{-- <h1>Manage Astrologers</h1> --}}
            <div id="add-button-container">
                {{-- <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search Astrologer..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form> --}}
                <a href="#" class="add-button" onclick="openPopup1()">+ Add Help Support</a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <section class="astrologer-list">
                <table class="astrologer-table">
                    <tbody>
                        <tr>
                            <td>First Free Session</td>
                            <td class="action-buttons-faQs">
                                <a href="#" class="action-button add" onclick="openPopup()">+ Add</a>
                                <a href="#" class="action-button view">View</a>
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Account related</td>
                            <td class="action-buttons-faQs">
                                <a href="#" class="action-button add" onclick="openPopup()">+ Add</a>
                                <a href="#" class="action-button view">View</a>
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Astrologer related</td>
                            <td class="action-buttons-faQs">
                                <a href="#" class="action-button add" onclick="openPopup()">+ Add</a>
                                <a href="#" class="action-button view">View</a>
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Wallet related</td>
                            <td class="action-buttons-faQs">
                                <a href="#" class="action-button add" onclick="openPopup()">+ Add</a>
                                <a href="#" class="action-button view">View</a>
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>

                        <!-- Add more astrologer items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- + add support button Banner Popup -->
    <div id="popupForm-addsupport" class="popup-overlay" style="display:none;">
        <div class="popup-box1">
            <span class="close-btn" onclick="closePopup1()">&times;</span>
            <h2>Add Help Support</h2>
            <form>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title">

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
    </div>

    <!-- Edit button Popup -->
    <div id="popupForm-edit" class="popup-overlay" style="display:none;">
        <div class="popup-box1">
            <span class="close-btn" onclick="closePopup2()">&times;</span>
            <h2>Edit Help Support</h2>
            <form>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title">

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
    </div>

    <!-- Delete button Popup -->
    <div id="popupForm-delete" class="popup-overlay" style="display:none;">
        <div class="popup-box1">
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

    <!-- add button Banner Popup -->
    <div id="popupForm" class="popup-overlay" style="display:none;">
        <div class="popup-box">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Add Help Support SubCategory</h2>
            <form>
                <label for="title">SubCategory:</label>
                <input type="text" id="title" name="title" placeholder="SubCategory"><br><br>

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
    </div>
@endsection
