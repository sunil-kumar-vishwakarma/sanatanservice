@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <div class="back-button-container" >
            <a href="{{ route('admin.arti.audio') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>Back
            </a>

            <br>
        </div>
        <main class="main-content">
            <section class="audio-management">
                <h2>Edit </h2>
                <form id="audioForm" action="{{ route('admin.arti.audio') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="audio_name">Audio Name:</label>
                        <input type="text" id="audio_name" name="audio_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="audio_file">Audio File:</label>
                        <input type="file" id="audio_file" name="audio_file" class="form-control" accept="audio/*"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="pdf_file">PDF File:</label>
                        <input type="file" id="pdf_file" name="pdf_file" class="form-control" accept="application/pdf"
                            required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="action-button add">Update</button>
                    </div>
                </form>
            </section>
        </main>
    </div>

<style>
    .main-content {
    margin-top: 80px;
}
/* back Button Container */
.back-button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    float: right;
}
.back-button {
    display: inline-block;
    background-color: #24007a;
    color: white;
    padding: 12px 15px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.back-button:hover {
    background-color: #25007ae1;
    transform: scale(1.05);
}

</style>
@endsection
