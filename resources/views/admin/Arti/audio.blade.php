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
                        <label for="pdf_file">Description:</label>
                        <!-- <input type="file" id="pdf_file" name="pdf_file" class="form-control" accept="application/pdf"
                            required> -->
                            <textarea name="description" id="description" rows="15" cols="170"></textarea>
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
                            <th>Placing</th>
                            <th>Thumbnail</th>
                            <th>Audio Name</th>
                            <th>description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($audios as $audio)
                            <tr>
                                <td>{{ $audio->id }}</td>
                                <td class="audio-action-buttons">
                                    <button class="audio-move-up"><i class="fa-solid fa-arrow-up"
                                            style="margin-left: 7px;"></i></button>
                                    <button class="audio-move-down"><i class="fa-solid fa-arrow-down"
                                            style="margin-left: 7px;"></i></button>
                                </td>


                                <td><img src="{{ asset('storage/' . $audio->thumbnail_path) }}"
                                        alt="{{ $audio->audio_name }}" class="audio-thumbnail"></td>
                                <td>
                                    @if (!empty($audio->audio_path))
                                        <audio controls>
                                            <source src="{{ asset('storage/' . $audio->audio_path) }}" type="audio/mpeg">
                                        </audio>
                                        <p>{{ $audio->audio_name }}</p>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($audio->description))
                                    <p>{{$audio->description}}</p>
                                        <!-- <a href="{{ asset('storage/' .$audio->pdf_path) }}" target="_blank">
                                        <i class="fa-solid fa-file-pdf" style="color: red;"></i>
                                        </a> -->
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.arti.edit',$audio->id) }}" class="action-button edit">Edit</a>
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
    @if(session('success'))
    <script>
        // alert("{{ session('message') }}"); // Show success message
        setTimeout(() => {
            window.location.href = "{{ route('admin.arti.audio') }}";
        }, 2000); // Redirect after 2 seconds
    </script>
@endif
    <style>
        .audio-action-buttons {
            display: flex;
            flex-direction: column;
            gap: 23px;
            align-items: center;
            /* justify-content: center; */
        }

        .audio-action-buttons button {
            display: inline-block;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            color: black;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
        }

        .audio-action-buttons button:hover {
            background-color: #24007a;
            transform: scale(1.05);
            /* transform: scale(1.05);  */
            /* color: #11003a; */
            color: white;
        }

        .audio-table th,
        .audio-table td {
            margin: 120px 0px;
        }
    </style>
@endsection
