@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <div class="back-button-container" >
            <a href="{{ route('admin.live.arti') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>Back
            </a>

            <br>
        </div>
        <main class="main-content">
            <section class="audio-management">
                <h2>Edit</h2>
                <form id="videoForm" action="{{ route('admin.live.arti.update',$video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="video_name">Video Name:</label>
                        <input type="text" id="video_name" name="video_name" class="form-control" value="{{$video->video_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                    <img src="{{ asset('storage/' .$video->thumbnail_path) }}" alt="{{ $video->video_name }}"
                                        class="video-thumbnail" width="300px;">
                    </div>

                    <div class="form-group">
                        <label for="video_option">Select Video Option:</label>
                        <select id="video_option" name="video_option" class="form-control" onchange="toggleVideoInput()">
                            <option value="file" {{ ($video->video_option ?? '') == 'file' ? 'selected' : '' }}>Upload Video</option>
                            <option value="url" {{ ($video->video_option ?? '') == 'url' ? 'selected' : '' }}>Video URL</option>
                        </select>
                    </div>

                        <!-- Video File Input -->
                        <div class="form-group" id="video_file_div" style="display: none;">
                            <label for="video_file">Video File:</label>
                            <input type="file" id="video_file" name="video_file" class="form-control" accept="video/*">
                            <video width="320" height="240" controls>
                                                                    <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                                                    {{ $video->video_name }}
                                                                </video>
                        </div>

                <!-- Video URL Input -->
                    <div class="form-group" id="video_url_div" style="display: none;">
                        <label for="video_url">Video URL:</label>
                        <input type="url" id="video_url" name="video_url" class="form-control"
                            placeholder="Enter video URL" value="{{ $video->video_url ?? '' }}">
                        @if (!empty($video->video_url))
                            <iframe width="320" height="240"
                                src="{{ str_replace('watch?v=', 'embed/', $video->video_url) }}"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="action-button add">Update</button>
                    </div>
                </form>
            </section>
        </main>
    </div>


<script>
    function toggleVideoInput() {
        var option = document.getElementById('video_option').value;
        var fileDiv = document.getElementById('video_file_div');
        var urlDiv = document.getElementById('video_url_div');

        if (option === 'file') {
            fileDiv.style.display = 'block';
            urlDiv.style.display = 'none';
        } else if (option === 'url') {
            fileDiv.style.display = 'none';
            urlDiv.style.display = 'block';
        } else {
            fileDiv.style.display = 'none';
            urlDiv.style.display = 'none';
        }
    }

    // Run function on page load to set the correct visibility
    document.addEventListener("DOMContentLoaded", function() {
        toggleVideoInput();
    });
</script>

    <script>
        function toggleVideoInput() {
            var option = document.getElementById("video_option").value;

            if (option === "file") {
                document.getElementById("video_file_div").style.display = "block";
                document.getElementById("video_url_div").style.display = "none";
            } else {
                document.getElementById("video_file_div").style.display = "none";
                document.getElementById("video_url_div").style.display = "block";
            }
        }
    </script>

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
