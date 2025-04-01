@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.astrologers') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Add Astrologer</h2>
                <br>
                <form id="customerForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profile">Profile Picture:</label>
                        <input type="file" id="profile" name="profile" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No.:</label>
                        <input type="text" id="contact_no" name="contact_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Status:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="male">Active</option>
                            <option value="female">Inactive</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="action-button add">Add Astrologer</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
