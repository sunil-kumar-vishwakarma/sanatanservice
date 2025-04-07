@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Astrologer/astrologers.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>

            <section class="astrologer-list">
                <table class="astrologer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USER TYPE</th>
                            <th>USER</th>
                            <th>DATE</th>
                            <th>KUNDLI TYPE</th>
                            <th>COST</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>User</td>
                            <td>Vishnu</td>
                            <td>26-03-2025</td>
                            <td>Small</td>
                            <td>20</td>
                            <td>
                                <a href="#" download class="download-btn"><i class="fas fa-download"></i>PDF</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>User</td>
                            <td>Amit</td>
                            <td>28-03-2025</td>
                            <td>Large</td>
                            <td>50</td>
                            <td>
                                <span class="no-pdf">No PDF Available</span>
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
@endsection
