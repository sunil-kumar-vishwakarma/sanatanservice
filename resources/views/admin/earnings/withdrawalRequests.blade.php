@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\astrologers.css') }}">
    <link rel="stylesheet" href="{{ asset('css\Astrologer\pending-request.css') }}">
    <script src="{{ asset('js\pendin-request.js') }}" defer></script>

    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search ..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>
            {{-- <h1>Pending Astrologer Requests</h1> --}}
            <section class="astrologer-list">
                <table class="astrologer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>METHOD NAME</th>
                            {{-- <th>CONTACT NO.</th>
                            <th>EMAIL</th> --}}

                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>UPI</td>
                            {{-- <td>123-456-7890</td>
                            <td>john.doe@example.com</td> --}}

                            <td>
                                <button class="status-button pending" data-status="pending">Pending</button>
                            </td>
                        </tr>


                        <!-- Add more astrologer items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
