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
                            <th>DATE</th>
                            <th>METHOD NAME</th>
                            <th>WITHDRAWAL AMOUNT</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>01-04-25</td>
                            <td>UPI</td>
                            <td>₹ 5000</td>
                            <td class="successs">Succesfull</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sohit Doe</td>
                            <td>01-04-25</td>
                            <td>Bank Account</td>
                            <td>₹ 2000</td>
                            <td class="failed">Failed</td>
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
<style>
    .failed{
        color: red;
        font-weight: bold;
    }
    .successs{
        color: green;
        font-weight: bold;
    }
</style>
@endsection
