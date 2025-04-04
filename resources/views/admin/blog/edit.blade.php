@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/temple/temple.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="audio-management">
                <h2 style="width: 300px;margin-top: 35px;">Edit Blog </h2><a href="{{route('admin.blog.list')}}" class="add-button" style="float: right; margin-top: -56px;">  <i class="fas fa-arrow-left"></i> Back</a><br><br>
                <form id="audioForm" action="{{ route('admin.blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" id="blog_id" name="blog_id" class="form-control" value="{{$blog->id}}" required>
                        <label for="audio_name">Blog Title:</label>
                        <input type="text" id="blog_title" name="blog_title" class="form-control" value="{{$blog->blog_title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Blog Image:</label>
                        <input type="file" id="blog_image" name="blog_image" class="form-control" accept="image/*"
                            >
                            <img src="{{ asset('storage/' .  $blog->blog_image) }}"
                                    alt="Blog Image" class="blog-image" width="300px;" height="300px;">
                    </div>


                    <div class="form-group">
                        <label for="pdf_file">Description:</label>
                        <textarea type="text" id="description" name="description" class="form-control" accept="application/pdf"
                            required>{{$blog->description}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="audio_name">Blog Status:</label>
                        <input type="text" id="blog_status" name="blog_status" value="{{$blog->status}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-primary action-button add ">Submit</button>
                    </div>
                </form>
            </section>
</main>
</div>

@endsection
