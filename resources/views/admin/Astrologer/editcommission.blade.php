@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.commission') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Update Commission</h2>
                <br>
                <form id="customerForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Astrologer:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Category:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Commission Rate (%):</label>
                        <input type="number" value="10" min="0" max="100" class="form-control"
                        required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="action-button add">Update Commission</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
