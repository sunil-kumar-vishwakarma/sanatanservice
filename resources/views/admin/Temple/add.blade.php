@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/temple/temple.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="audio-management">
                <h2 style="width: 300px;margin-top: 35px;">Add New Temple </h2><a href="{{route('admin.temple.list')}}" class="add-button" style="float: right; margin-top: -56px;">+ Back Temple</a><br><br>
                <form id="audioForm" action="{{ route('admin.temple.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="audio_name">Name:</label>
                        <input type="text" id="temple_name" name="temple_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*"
                            required>
                    </div>
                    

                    <div class="form-group">
                        <label for="pdf_file">Description:</label>
                        <textarea type="text" id="description" name="description" class="form-control" accept="application/pdf" 
                            required> </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-primary action-button add ">Add templa</button>
                    </div>
                </form>
            </section>
</main>
</div>

@endsection
