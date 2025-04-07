{{-- resources/views/temple/list.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/temple/temple.css') }}">
    <link rel="stylesheet" href="{{ asset('css\popus.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
    <div class="container">
        <main class="main-content">
            <section class="temple-list">
                <div class="add-button-container">
                    <form class="search-form" action="#">
                        <input type="text" name="search" placeholder="Search Temple..." class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </form>
                    <a href="{{route('admin.temple.add')}}" class="add-button">+ Add Temple</a>
                </div>
                <table class="temple-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Temple Name</th>
                            <th>Temple Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($temp_list as $value)
                        <tr>
                        <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' .  $value->photo) }}" alt="Temple Image" class="temple-image">
                            </td>
                            <td class="description description-data" style="width: 300px; padding-bottom: initial;">
                            {{ $value->description }}</td>
                            <td class="">
                            <a href="{{ route('admin.temple.view', $value->id) }}" class="action-button view">View</a>

                            <a href="{{ route('admin.temple.edit')}}" class="action-button edit">Edit</a>
                            <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a>
                            </td>
                        </tr>
                        @endforeach

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
