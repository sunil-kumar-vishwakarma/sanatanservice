@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="pdf-management">
                <h2>Add Wisdom video</h2>
                <form id="videoForm" action="#" method="POST" enctype="multipart/form-data">
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
                        <button type="submit" class="action-button add">Add video</button>
                    </div>
                </form>
            </section>
            <section class="pdf-list">
                <h2>Video List</h2>
                <table class="audio-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Video</th>
                            <th>Language</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td><img src="https://www.citypng.com/public/uploads/preview/download-black-male-user-profile-icon-png-701751695035033bwdeymrpov.png" alt=""
                                    class="audio-thumbnail">
                            </td>
                            <td>Video</td>
                            <td>English</td>
                            <td class="action-buttons">
                                <a href="{{ route('admin.Wisdom.edit') }}" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>



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
@endsection
