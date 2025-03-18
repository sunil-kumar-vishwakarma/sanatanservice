<!-- resources/views/admin/Astrologer/categories.blade.php -->
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Astrologer/categories.css') }}">
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search category..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="#" class="add-button">+ Add Category</a>
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
                            <td><img src="{{ asset('path/to/astrologer-image.png') }}" alt="Category Image"></td>
                            <td>New category</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="{{ asset('path/to/astrologer-image.png') }}" alt="Category Image"></td>
                            <td>Maritial Life</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="{{ asset('path/to/astrologer-image.png') }}" alt="Category Image"></td>
                            <td>Kids</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="{{ asset('path/to/astrologer-image.png') }}" alt="Category Image"></td>
                            <td>Education</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><img src="{{ asset('path/to/astrologer-image.png') }}" alt="Category Image"></td>
                            <td>Finance & Business</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><img src="{{ asset('path/to/astrologer-image.png') }}" alt="Category Image"></td>
                            <td>Career & Job</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                            </td>
                        </tr>
                        <!-- Add more category items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
