{{-- resources/views/astrologer/commission_rate.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/astrologer/commission_rate.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="{{ route('admin.Astrologer.addcommission') }}" class="add-button">+ Add Commission</a>
            </div>
            <section class="commission-rate-list">
                <table class="commission-rate-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Astrologer</th>
                            <th>Category</th>
                            <th>Commission Rate (%)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>Horoscope</td>
                            <td>
                                <input type="number" value="10" min="0" max="100" class="form-control"
                                    required>
                            </td>
                            <td class="action-buttons">
                                <div class="button-group">
                                    <button type="button" class="action-button update">Update</button>
                                    <a href="{{ route('admin.Astrologer.editcommission') }}" class="action-button edit">Edit</a>
                                    <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Doe</td>
                            <td>Horoscope</td>
                            <td>
                                <input type="number" value="15" min="0" max="100" class="form-control"
                                    required>
                            </td>
                            <td class="action-buttons">
                                <div class="button-group">
                                    <button type="button" class="action-button update">Update</button>
                                    <a href="{{ route('admin.Astrologer.editcommission') }}" class="action-button edit">Edit</a>
                                    <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Emily Johnson</td>
                            <td>Horoscope</td>
                            <td>
                                <input type="number" value="20" min="0" max="100" class="form-control"
                                    required>
                            </td>
                            <td class="action-buttons">
                                <div class="button-group">
                                    <button type="button" class="action-button update">Update</button>
                                    <a href="{{ route('admin.Astrologer.editcommission') }}" class="action-button edit">Edit</a>
                                    <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                                </div>
                            </td>
                        </tr>
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
