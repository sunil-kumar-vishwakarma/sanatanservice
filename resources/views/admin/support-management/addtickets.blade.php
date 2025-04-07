@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.support-management.tickets') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Add Ticket</h2>
                <br>
                <form id="customerForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Ticket ID:</label>
                        <input type="text" id="contact_no" name="contact_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Issue:</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Status:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="Pending">---Select Status---</option>
                            <option value="Pending">Pending</option>
                            <option value="Failed">Failed</option>
                            <option value="Succesfull">Succesfull</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="action-button add">Add Ticket</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
