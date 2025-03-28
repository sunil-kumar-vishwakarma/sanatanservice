<!-- resources/views/admin/Astrologer/skills.blade.php -->
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\skills.css') }}">
    <div class="container">
        <main class="main-content">

            <section class="skill-list">
                <table class="skill-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>Leo</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                {{-- <a href="#" class="action-button delete">Delete</a> --}}
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}"
                                    alt="Profile"></td>
                            <td>Cancer</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                {{-- <a href="#" class="action-button delete">Delete</a> --}}
                            </td>
                        </tr>

                        <!-- Add more skill items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
