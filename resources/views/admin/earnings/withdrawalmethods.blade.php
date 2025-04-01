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

            <section class="withdrawal-list">
                <table class="withdrawal-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>METHOD NAME</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bank Account</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>UPI</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Cash</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </section>



        </main>
    </div>

    <!-- Edit button Popup -->
    <div id="popupForm-edit" class="popup-overlay" style="display:none;">
        <div class="popup-box1">
            <span class="close-btn" onclick="closePopup2()">&times;</span>
            <h2>Edit</h2>
            <form>
                <label for="title">Method Name:</label>
                <input type="text" id="title" name="title" placeholder="Title">

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
    </div>
@endsection
