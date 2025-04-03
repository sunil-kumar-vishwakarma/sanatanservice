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
        <!-- Left Side: Entries per page -->
        <div class="entries-per-page">
            <label for="entries-per-page">Show:</label>
            <select id="entries-per-page">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>entries per page</span>
        </div>

        <!-- Right Side: Pagination -->
        <div class="pagination-buttons">
            <button disabled>« Previous</button>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">...</a>
            <button>Next »</button>
        </div>
    </div>

    <style>
        .pagination-container {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin: 20px 0;
        }

        select {
            padding: 5px;
            font-size: 16px;
        }

        .entries {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
        }

        .entries p {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .pagination-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination-buttons button {
            padding: 10px 15px;
            border: 1px solid #ddd;
            background: #f8f9fa;
            cursor: pointer;
        }

        .pagination-buttons button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
@endsection
