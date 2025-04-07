@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <script src="{{ asset('js\popupform.js') }}" defer></script>
      <!-- CKEditor Script -->
      <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <div class="add-container">
        <div class="back-button-container">
            <a href="{{ route('admin.master-setting.reportTypes') }}" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <br>
        </div>
        <main class="add-content">
            <section class="customer-management">
                <h2>Add Report Type</h2>
                <br>
                <form id="customerForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Image:</label>
                        <input type="file" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="action-button add">Add Report Type</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection
