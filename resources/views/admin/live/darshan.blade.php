@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="pdf-management">
                <h2>Add New live darshan video</h2>
                <form id="videoForm" action="{{ route('admin.live.darshan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="video_name">video Name:</label>
                        <input type="text" id="video_name" name="video_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                            required>
                    </div>

                    <div class="form-group">
                            <label for="video_option">Select Video Option:</label>
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
                            <input type="url" id="video_url" name="video_url" class="form-control" placeholder="Enter video URL">
                        </div>

                    <!-- <div class="form-group">
                        <label for="video_file">video File:</label>
                        <input type="file" id="video_file" name="video_file" class="form-control"
                            accept="application/video" required>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="action-button add">Add video</button>
                    </div>
                </form>
            </section>
            <section class="pdf-list">
                <h2>video List</h2>
                <table class="audio-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>video Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td><img src="{{ asset('storage/' .$video->thumbnail_path) }}" alt="{{ $video->video_name }}"
                                        class="audio-thumbnail"></td>
                                <td>

                                @if ($video->video_path)
        <video width="320" height="240" controls>
            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
            {{ $video->video_name }}
        </video>
    @elseif ($video->video_url)
    <iframe width="320" height="240" src="{{ str_replace('watch?v=', 'embed/', $video->video_url) }}" 
    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
</iframe>
    
        <!-- <iframe width="320" height="240" src="{{ $video->video_url }}" frameborder="0" allowfullscreen>{{ $video->video_name }}</iframe> -->
    @endif
    </td>
                                <td class="action-buttons">
                                    <form action="{{ route('admin.live.arti.destroy', $video->id) }}" method="POST"
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

    <!-- <script>
        document.getElementById('videoForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Server Response:", data);

                    if (data.success) {
                        const videoList = document.querySelector('.audio-table tbody');
                        const newRow = document.createElement('tr');

                        newRow.innerHTML = `
                <td>${data.video.id}</td>
                <td><img src="${data.video.thumbnail_path}" alt="${data.video.video_name}" class="audio-thumbnail"></td>
                <td>${data.video.video_name}</td>
                <td class="action-buttons">
                    <form action="/admin/arti/video/${data.video.id}" method="POST" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="action-button delete">Delete</button>
                    </form>
                    <a href="${data.video.video_path}" class="action-button view" target="_blank">View</a>
                </td>
            `;

                        videoList.appendChild(newRow); // ✅ New video ko list me add karein

                        // Form clear karein
                        document.getElementById('videoForm').reset();
                    } else {
                        alert(data.message || 'Failed to add video.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong.');
                });
        });
    </script> -->
    <script>
        document.getElementById('videoForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Video added successfully!');
            location.reload();
        } else if (data.errors) {
            let errorMessages = "";
            for (const [key, value] of Object.entries(data.errors)) {
                errorMessages += `${key}: ${value.join(', ')}\n`;
            }
            alert(`Failed to add video:\n${errorMessages}`);
        }
    })
    .catch(error => console.error('Error:', error));
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
@endsection
