@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/arti/arti.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="audio-management">
                <h2>Add New Audio</h2>
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
                        <button type="submit" class="action-button add">Add Audio</button>
                    </div>
                </form>
            </section>

            <section class="audio-list">
                <h2>Audio List</h2>
                <table class="audio-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Audio Name</th>
                            <th>PDF</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($audios as $audio)
                            <tr>
                                <td>{{ $audio->id }}</td>
                                <td><img src="{{ asset('storage/' .$audio->thumbnail_path) }}" alt="{{ $audio->audio_name }}"
                                        class="audio-thumbnail"></td>
                                <td>@if(!empty($audio->audio_path))

                                        <audio controls>
                                            <source src="{{ asset('storage/' . $audio->audio_path) }}" type="audio/mpeg">
                                        </audio>
                                        <p>{{ $audio->audio_name }}</p>
                                    @else
                                        N/A
                                    @endif</td>
                                <td>
                                    @if(!empty($audio->pdf_path))
                                        <a href="{{ asset('storage/' .$audio->pdf_path) }}" target="_blank">
                                        <i class="fa-solid fa-file-pdf" style="color: red;"></i>
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.arti.edit') }}" class="action-button edit">Edit</a>
                                    <form action="{{ route('admin.arti.audio.destroy', $audio->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script>
        document.getElementById('audioForm').addEventListener('submit', function(event) {
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
                    if (data.success) {
                        // Add the new audio to the list
                        const audioList = document.querySelector('.audio-table tbody');
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                <td>${data.audio.id}</td>
                <td><img src="${data.audio.thumbnail_path}" alt="${data.audio.audio_name}" class="audio-thumbnail"></td>
                <td>${data.audio.audio_name}</td>
                <td class="action-buttons">
                    <form action="/admin/arti/audio/${data.audio.id}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-button delete">Delete</button>
                    </form>
                </td>
            `;
                        audioList.appendChild(newRow);

                        // Show success message
                        // alert(data.message);
                    } else {
                        // Show error message
                        if (data.errors) {
                            let errorMessages = '';
                            for (let field in data.errors) {
                                errorMessages += `${data.errors[field]}\n`;
                            }
                            alert('Validation errors:\n' + errorMessages);
                        } else {
                            // alert(data.message);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Failed to add audio.');
                });
        });
    </script>
@endsection
