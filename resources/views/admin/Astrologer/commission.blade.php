{{-- resources/views/astrologer/commission_rate.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/astrologer/commission_rate.css') }}">
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search commission..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <a href="#" class="add-button">+ Add Commission</a>
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
                                    <a href="#" class="action-button delete">Delete</a>
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
                                    <a href="#" class="action-button delete">Delete</a>
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
                                    <a href="#" class="action-button delete">Delete</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
