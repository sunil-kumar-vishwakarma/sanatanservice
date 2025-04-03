{{-- resources/views/Horoscope/feedback.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Astrologer/review.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="review-list">
                <table class="review-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            {{-- <th>Astrologer</th> --}}
                            <th>User</th>
                            <th>Rating</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedback as $rows)
                        <tr>
                            <td>{{$rows->id}}</td>

                            <td>{{$rows->user['name']}}</td>
                            <td>
                            @for ($i = 0; $i < $rows->rating; $i++)
                            ⭐
                            @endfor

                            </td>
                            <td>{{$rows->feedback}}</td>
                        </tr>
                        @endforeach

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
        <a href="#">3 ...</a>
        <button>Next »</button>
    </div>
@endsection
