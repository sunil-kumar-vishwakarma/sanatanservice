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
                    <a href="#" class="add-button">+ Add Blog</a>
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
                        <tr>
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
                        </tr>
                        <!-- Add more blog entries as needed -->
                    </tbody>
                </table>
            </section>
        </main>
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

    </style>
@endsection
