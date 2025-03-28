<!-- resources/views/admin/Astrologer/skills.blade.php -->
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\skills.css') }}">
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search Team Role..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="#" class="add-button">+ Add Team Role</a>
            </div>
            <section class="skill-list">
                <table class="skill-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>New Role</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sub Admin</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>New Admin</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>

                        <!-- Add more skill items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
