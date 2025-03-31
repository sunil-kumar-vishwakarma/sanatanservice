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
            <!-- <section class="audio-management">
                <h2>Edit </h2>
                <form id="audioForm" action="{{ route('admin.arti.audio') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="audio_name">Audio Name:</label>
                        <input type="text" id="audio_name" name="audio_name" class="form-control" value="{{$audio->audio_name}}" required>
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
            </section> -->

            <form id="audioForm" action="{{ route('admin.arti.audio.update', $audio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="audio_name">Audio Name:</label>
        <input type="text" id="audio_name" name="audio_name" class="form-control" value="{{ $audio->audio_name }}" required>
    </div>
    
    <div class="form-group">
        <label for="thumbnail">Thumbnail:</label>
        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
        <img src="{{ asset('storage/' .$audio->thumbnail_path) }}" alt="{{ $audio->audio_name }}"
                                        class="audio-thumbnail">
        <!-- <img src="{{ asset('storage/'.$audio->thumbnail) }}" width="100" alt="Current Thumbnail"> -->
    </div>
    
    <div class="form-group">
        <label for="audio_file">Audio File:</label>
        <input type="file" id="audio_file" name="audio_file" class="form-control" accept="audio/*">
        <!-- <audio controls>
            <source src="{{ asset('storage/'.$audio->audio_file) }}" type="audio/mpeg">
        </audio> -->
        <audio controls>
            <source src="{{ asset('storage/' . $audio->audio_path) }}" type="audio/mpeg">
        </audio>
    </div>

    <div class="form-group">
        <label for="pdf_file">Description:</label>
        <textarea name="description" id="description" rows="15" cols="170">{{$audio->description}}</textarea>
        <!-- <input type="file" id="pdf_file" name="pdf_file" class="form-control" accept="application/pdf">
        <a href="{{ asset('storage/'.$audio->pdf_path) }}" target="_blank">View PDF</a> -->
    </div>

    <div class="form-group">
        <button type="submit" class="action-button add">Update</button>
    </div>
</form>

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
