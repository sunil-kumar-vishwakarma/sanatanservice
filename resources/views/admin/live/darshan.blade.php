@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="pdf-management">
                <h2>Add New video</h2>
                <form id="videoForm" action="{{ route('admin.live.arti.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="video_file">video File:</label>
                        <input type="file" id="video_file" name="video_file" class="form-control"
                            accept="application/video" required>
                    </div>
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
                                <td><img src="{{ Storage::url($video->thumbnail_path) }}" alt="{{ $video->video_name }}"
                                        class="audio-thumbnail"></td>
                                <td>{{ $video->video_name }}</td>
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

    <script>
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
    </script>
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
@endsection
