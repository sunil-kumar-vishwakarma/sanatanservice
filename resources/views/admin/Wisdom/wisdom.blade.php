@extends('admin.layout')
@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="pdf-management">
                <h2>Add Wisdom video</h2>
                <form id="videoForm" action="{{route('admin.Wisdom.add')}}" method="POST" enctype="multipart/form-data">
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
                        <select id="language" name="language" class="form-control">
                            <option value="Hindi">Hindi</option>
                            <option value="English">English</option>
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
                            <th>Placing</th>
                            <th>Thumbnail</th>
                            <th>Video</th>
                            <th>Language</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td class="audio-action-buttons">
                                    <button class="audio-move-up"><i class="fa-solid fa-arrow-up"
                                            style="margin-left: 7px;"></i></button>
                                    <button class="audio-move-down"><i class="fa-solid fa-arrow-down"
                                            style="margin-left: 7px;"></i></button>
                                </td>
                                <td><img src="{{ asset('storage/' . $video->thumbnail_path) }}"
                                        alt="{{ $video->video_name }}" class="audio-thumbnail"></td>
                                <td>

                                @if ($video->video_path)
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                            {{ $video->video_name }}
                                        </video>
                                    @elseif ($video->video_url)
                                        <iframe width="320" height="240"
                                            src="{{ str_replace('watch?v=', 'embed/', $video->video_url) }}" frameborder="0"
                                            allow="autoplay; encrypted-media" allowfullscreen>
                                        </iframe>

                                        <!-- <iframe width="320" height="240" src="{{ $video->video_url }}" frameborder="0" allowfullscreen>{{ $video->video_name }}</iframe> -->
                                    @endif
                                </td>
                                <td>{{ $video->language }}</td>

                                <td class="action-buttons">
                                    <a href="{{ route('admin.wisdom.edit', $video->id) }}" class="action-button edit">Edit</a>
                                    <form action="{{ route('admin.wisdom.destroy', $video->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button delete">Delete</button>
                                    </form>
                                    {{-- <a href="{{ Storage::url($video->video_path) }}" class="action-button view"
                                        target="_blank">View</a> --}}
                                </td>
                            </tr>
                        @endforeach
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
