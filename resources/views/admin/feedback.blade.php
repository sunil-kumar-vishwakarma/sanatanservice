{{-- resources/views/Horoscope/feedback.blade.php --}}

@extends('admin.layout')

@section('content')
    <!-- <link rel="stylesheet" href="{{ asset('css/astrologer/review.css') }}"> -->
    <div class="container"> <br><br><br><br><br>
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
                            <td>1</td>
                            {{-- <td>John Doe</td> --}}
                            <td>{{$rows->user['name']}}</td>
                            <td>
                            @for ($i = 0; $i < $rows->rating; $i++)
                            ⭐
                            @endfor
                                <!-- {{$rows->rating}} -->
                            </td>
                            <td>{{$rows->feedback}}</td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td>2</td>
                            {{-- <td>Jane Doe</td> --}}
                            <td>John Smith</td>
                            <td>Good, but could be better.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            {{-- <td>Emily Johnson</td> --}}
                            <td>Michael Brown</td>
                            <td>Very helpful and insightful.</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            {{-- <td>Robert Lee</td> --}}
                            <td>Sarah Connor</td>
                           <td>Not very accurate.</td>
                        </tr> -->

                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
