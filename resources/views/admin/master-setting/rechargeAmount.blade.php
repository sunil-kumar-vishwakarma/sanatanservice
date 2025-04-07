<!-- resources/views/admin/Astrologer/skills.blade.php -->
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\skills.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
    <div class="container">
        <main class="main-content">

            <section class="skill-list">
                <table class="skill-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>AMOUNT</th>
                            <th>CASHBACK</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>10</td>
                            <td>5%</td>

                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2000</td>
                            <td>15%</td>

                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>5000</td>
                            <td>20%</td>

                            <td class="action-buttons">
                                <a href="#" class="action-button edit" onclick="openPopup2()">Edit</a>
                                <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>


                        <!-- Add more skill items as needed -->
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
            <h2>Edit </h2>
            <form class="edit-form">
                <label for="title">Amount:</label>
                <input type="text" id="title" name="title">

                <label for="title">Cashback:</label>
                <input type="text" id="title" name="title">

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
