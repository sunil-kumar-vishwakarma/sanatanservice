{{-- resources/views/blog/list.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog-list.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="blog-list">
                <div class="add-button-container">
                    <form class="search-form" action="#">
                        <input type="text" name="search" placeholder="Search blogs..." class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </form>
                    <a href="{{ route('admin.blog.create') }}" class="add-button">+ Add Blog</a>
                </div>
                <table class="blog-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                                    <td>1</td>
                                    <td>Zodiac Signs Men Clingy in Romance</td>
                                    <td>
                                        <img src="{{ asset('https://s7ap1.scene7.com/is/image/incredibleindia/konark-temple-puri-odisha-2-attr-hero?qlt=82&ts=1726674676369') }}"
                                            alt="Blog Image" class="blog-image">
                                    </td>
                                    <td class="description">
                                        Have you ever dated someone who just couldn’t give you enough space? Some men are naturally
                                        more clingy in relationships, and astrology can help us understand why.
                                    </td>
                                    <td class="status">
                                        <button onclick="toggleStatus(this)" class="status-button" data-status="draft"
                                            style="background-color: #d90000;">Draft</button>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="#" class="action-button view">View</a>
                                        <a href="#" class="action-button edit">Edit</a>
                                        <a href="#" class="action-button delete">Delete</a>
                                    </td>
                                </tr> -->
                        @foreach ($blogs as $rows)
                            <tr>
                                <td>{{ $rows->id }}</td>
                                <td>{{ $rows->blog_title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $rows->blog_image) }}" alt="Blog Image"
                                        class="blog-image">
                                </td>
                                <td class="description description-data" style="width: 300px; padding-bottom: initial;">
                                    {{ $rows->description }}
                                </td>
                                <td class="status">
                                    <button onclick="toggleStatus(this)" class="status-button" data-status="draft"
                                        style="background-color: #d90000;">{{ $rows->status }}</button>
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.blog.view', $rows->id) }}" class="action-button view">View</a>
                                    <a href="{{ route('admin.blog.edit', $rows->id) }}" class="action-button edit">Edit</a>
                                    <!-- <a href="#" class="action-button delete">Delete</a> -->

                                    <form action="{{ route('admin.blog.destroy', $rows->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button delete">Delete</button>
                                    </form>
                                    {{-- <a href="#" class="action-button delete" onclick="openPopup3()">Delete</a> --}}

                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more blog entries as needed -->
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
    <script>
        function toggleStatus(button) {
            var currentStatus = button.getAttribute('data-status');
            var newStatus = currentStatus === 'draft' ? 'Published' : 'Draft';
            button.textContent = newStatus;
            button.style.backgroundColor = newStatus === 'Published' ? 'green' : '#d90000';
        }
    </script>
    <style>
        .description-data {
            display: block;
            display: -webkit-box;
            max-width: 100%;
            margin: 0 auto;
            line-height: 1;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
