<!-- resources/views/admin/Astrologer/categories.blade.php -->
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Astrologer/categories.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="{{ route('admin.Astrologer.addcategory') }}" class="add-button">+ Add Category</a>
            </div>
            <section class="category-list">
                <table class="category-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPulTQZoVDKBE_e-THwd434WEF7V7MPp_xTg&s') }}" alt="Category Image"></td>
                            <td>New category</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPulTQZoVDKBE_e-THwd434WEF7V7MPp_xTg&s') }}" alt="Category Image"></td>
                            <td>Maritial Life</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPulTQZoVDKBE_e-THwd434WEF7V7MPp_xTg&s') }}" alt="Category Image"></td>
                            <td>Kids</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPulTQZoVDKBE_e-THwd434WEF7V7MPp_xTg&s') }}" alt="Category Image"></td>
                            <td>Education</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPulTQZoVDKBE_e-THwd434WEF7V7MPp_xTg&s') }}" alt="Category Image"></td>
                            <td>Finance & Business</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPulTQZoVDKBE_e-THwd434WEF7V7MPp_xTg&s') }}" alt="Category Image"></td>
                            <td>Career & Job</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <!-- Add more category items as needed -->
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

    <!-- Edit button Popup -->
    <div id="popupForm-edit" class="popup-overlay" style="display:none;">
        <div class="popup-box1">
            <span class="close-btn" onclick="closePopup2()">&times;</span>
            <h2>Edit Category</h2>
            <form class="edit-form">
                <label for="title">Image:</label>
                <input type="file" id="title" name="title" >

                <label for="title">Name:</label>
                <input type="text" id="title" name="title" >

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
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
