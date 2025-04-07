@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}">
    <div class="container">
        <main class="main-content-contact">
            <section class="customer-list">
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>Description</th>
                            <th>Entry Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contact as $rows)
                        <tr>
                            <td>{{$rows->id}}</td>
                            <td>{{$rows->name}}</td>
                            <td>john.doe@example.com</td>
                            <td>{{$rows->message}}</td>
                            <td>{{$rows->created_at}}</td>
                        </tr>
                        @endforeach

                        <!-- <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td> Have you ever dated someone who just couldn’t give you enough space? Some men are naturally
                                more clingy in relationships, and astrology can help us understand why.</td>
                            <td>01 Mar,2025 08:58 AM</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td> Have you ever dated someone who just couldn’t give you enough space? Some men are naturally
                                more clingy in relationships, and astrology can help us understand why.</td>
                            <td>01 Mar,2025 08:58 AM</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td> Have you ever dated someone who just couldn’t give you enough space? Some men are naturally
                                more clingy in relationships, and astrology can help us understand why.</td>
                            <td>01 Mar,2025 08:58 AM</td>
                        </tr> -->

                        <!-- Add more customer items as needed -->
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
