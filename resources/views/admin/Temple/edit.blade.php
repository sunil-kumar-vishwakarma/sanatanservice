@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.temple.list') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Edit Temple Details</h2>
                <br>
                <form id="customerForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Temple Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="profile">Temple Image:</label>
                        <input type="file" id="profile" name="profile" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="profile">Description:</label>
                      <textarea name="description" class="form-control" cols="170" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="action-button add">Update</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
