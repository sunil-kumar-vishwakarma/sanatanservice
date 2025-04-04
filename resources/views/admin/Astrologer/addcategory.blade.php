@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.categories') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Add Category</h2>
                <br>
                <form id="customerForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Image:</label>
                        <input type="file" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="action-button add">Add Category</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
