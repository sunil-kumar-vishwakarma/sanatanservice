<!-- resources/views/admin/Astrologer/skills.blade.php -->
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Astrologer\skills.css') }}">
    <div class="container">
        <main class="main-content">

            <section class="skill-list">
                <table class="skill-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>AMOUNT</th>
                            <th>CASHBACK</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>10</td>
                            <td>5%</td>

                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2000</td>
                            <td>15%</td>

                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>5000</td>
                            <td>20%</td>

                            <td class="action-buttons">
                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>


                        <!-- Add more skill items as needed -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
