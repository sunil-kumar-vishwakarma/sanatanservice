{{-- resources/views/astrologer/review.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/astrologer/review.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="review-list">
                <table class="review-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Astrologer</th>
                            <th>User</th>
                            <th>Rating</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>Jane Smith</td>
                            <td>
                                <span class="rating">
                                    5 <i class="fas fa-star"></i>
                                </span>
                            </td>
                            <td>Excellent service, very accurate predictions!</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Doe</td>
                            <td>John Smith</td>
                            <td>
                                <span class="rating">
                                    3 <i class="fas fa-star"></i>
                                </span>
                            </td>
                            <td>Good, but could be better.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Emily Johnson</td>
                            <td>Michael Brown</td>
                            <td>
                                <span class="rating">
                                    4 <i class="fas fa-star"></i>
                                </span>
                            </td>
                            <td>Very helpful and insightful.</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Robert Lee</td>
                            <td>Sarah Connor</td>
                            <td>
                                <span class="rating">
                                    2 <i class="fas fa-star"></i>
                                </span>
                            </td>
                            <td>Not very accurate.</td>
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
