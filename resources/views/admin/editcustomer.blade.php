@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.customers') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Edit Customer</h2>
                <br>
                <form id="customerForm" action="{{route('admin.updateUser',$userDetail->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profile">Profile Picture:</label>
                        <input type="file" id="profile" name="profile" class="form-control" accept="image/*">
                        
                        <img src="{{ asset('storage/' .$userDetail->profile) }}" alt="{{ $userDetail->name }}"
                        class="video-thumbnail" width="200px;">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{$userDetail->name}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No.:</label>
                        <input type="text" id="contact_no" name="contact_no" value="{{$userDetail->contactNo}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{$userDetail->email}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date:</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($userDetail->birthDate)->format('Y-m-d') }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_time">Birth Time:</label>
                        <input type="time" id="birth_time" name="birth_time" value="{{$userDetail->birthTime}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="action-button add">Edit Customer</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
