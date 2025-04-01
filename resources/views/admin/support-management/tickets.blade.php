@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Astrologer/astrologers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Astrologer/pending-request.css') }}">
    <script src="{{ asset('js/pendin-request.js') }}" defer></script>

    <div class="container">
        <main class="main-content">
            <div class="add-button-container">
                <form class="search-form" action="#">
                    <input type="text" name="search" placeholder="Search ..." class="search-input">
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>

            <section class="astrologer-list">
                <table class="astrologer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>TICKET ID</th>
                            <th>ISSUE</th>
                            {{-- <th>SCREENSHOT</th> --}}
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>TCK-12345</td>
                            <td>Payment not received</td>

                            <td class="pending">Pending</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>TCK-67890</td>
                            <td>Login issue</td>

                            <td class="successs">Succesfull</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Michael Brown</td>
                            <td>TCK-11223</td>
                            <td>Account suspension</td>

                            <td class="failed">Failed</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <style>
        .failed{
            color: red;
        }
        .successs{
            color: green;
        }
        .pending{
            color: #ff6702;
        }
    </style>
@endsection
