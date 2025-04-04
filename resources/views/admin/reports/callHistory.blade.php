@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\astrologers.css') }}">
    <script src="{{ asset('js/statusbutton.js') }}" defer></script>

    <div class="container">
        <main class="main-content">
            {{-- <h1>Manage Astrologers</h1> --}}
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
                {{-- <a href="#" class="add-button">+ Add Call</a> --}}
            </div>
            <section class="astrologer-list">
                <table class="astrologer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USER</th>
                            <th>TYPE</th>
                            <th>ASTROLOGER</th>
                            {{-- <th>CALL RATE</th> --}}
                            <th>CALL TIME</th>
                            <th>TOTAL MIN</th>
                            {{-- <th>DEDUCTION</th> --}}
                            <th>CALL STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>Audio</td>
                            <td>vishnu</td>
                            <td>29-03-2025 12:59 PM</td>
                            <td>15</td>
                            <td>Accepted</td>

                        </tr>

                        <!-- Add more astrologer items as needed -->
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
