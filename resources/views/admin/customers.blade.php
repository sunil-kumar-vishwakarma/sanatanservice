@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}">
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search customer..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="#" class="add-button">+ Add Customer</a>
            </div>
            <section class="customer-list">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>CONTACT NO.</th>
                            <th>EMAIL</th>
                            <th>BIRTH DATE</th>
                            <th>BIRTH TIME</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>1990-01-01</td>
                            <td>12:00 PM</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>1990-01-01</td>
                            <td>12:00 PM</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>1990-01-01</td>
                            <td>12:00 PM</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>1990-01-01</td>
                            <td>12:00 PM</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>1990-01-01</td>
                            <td>12:00 PM</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png') }}" alt="Profile"></td>
                            <td>John Doe</td>
                            <td>123-456-7890</td>
                            <td>john.doe@example.com</td>
                            <td>1990-01-01</td>
                            <td>12:00 PM</td>
                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>

                        <!-- Add more customer items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
