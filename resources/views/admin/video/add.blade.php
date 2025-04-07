@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <style>
        .add-button {
            display: inline-block;
            background-color: #24007a;
            color: white;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
    </style>

    <div class="container">
        <main class="main-content">
            <section class="pdf-management">
                <h2 style="width: 300px;margin-top: 35px;">Add New Video </h2><a href="{{ route('admin.video.video') }}"
                    class="add-button" style="float: right; margin-top: -56px;"> <i class="fas fa-arrow-left"></i> Back
                    Video</a><br><br>
                <form id="videoForm" action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="video_name">video Title:</label>
                        <input type="text" id="video_title" name="video_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Cover Image:</label>
                        <input type="file" id="cover_image" name="cover_image" class="form-control" accept="image/*"
                            required>
                    </div>


                    <!-- Video URL Input -->
                    <div class="form-group" id="video_url_div">
                        <label for="video_url">Video URL:</label>
                        <input type="url" id="video_url" name="video_url" class="form-control"
                            placeholder="Enter video URL">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="action-button add">Add video</button>
                    </div>
                </form>
            </section>

        </main>
    </div>
@endsection
