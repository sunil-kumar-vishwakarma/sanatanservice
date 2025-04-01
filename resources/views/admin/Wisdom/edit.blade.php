@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <div class="back-button-container" >
            <a href="{{ route('admin.Wisdom.wisdom') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>Back
            </a>

            <br>
        </div>
        <main class="main-content">
            <section class="audio-management">
                <h2>Edit</h2>
                <form id="audioForm" action="{{ route('admin.live.arti') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="video_name">Video Name:</label>
                        <input type="text" id="video_name" name="video_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="video_option">Select Language:</label>
                        <select id="video_option" name="video_option" class="form-control">
                            <option value="text">Hindi</option>
                            <option value="text">English</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="video_option">Select Video Language:</label>
                        <select id="video_option" name="video_option" class="form-control" onchange="toggleVideoInput()">
                            <option value="file">Upload Video</option>
                            <option value="url">Video URL</option>
                        </select>
                    </div>

                    <!-- Video File Input -->
                    <div class="form-group" id="video_file_div">
                        <label for="video_file">Video File:</label>
                        <input type="file" id="video_file" name="video_file" class="form-control" accept="video/*">
                    </div>

                    <!-- Video URL Input -->
                    <div class="form-group" id="video_url_div" style="display: none;">
                        <label for="video_url">Video URL:</label>
                        <input type="url" id="video_url" name="video_url" class="form-control"
                            placeholder="Enter video URL">
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
