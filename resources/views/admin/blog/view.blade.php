{{-- resources/views/temple/details.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/temple/temple-view.css') }}">
    <style>
        .add-button {
    display: inline-block;
    background-color: #24007a;
    color: white;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}
    </style>
    <div class="container">
        <div class="temple-details">
        <h2 style="width: 300px;margin-top: 35px;">View Blog </h2><a href="{{route('admin.blog.list')}}" class="add-button" style="float: right; margin-top: -56px;">  <i class="fas fa-arrow-left"></i> Back</a><br><br>
            <div class="image-meta">
                <img src="{{ asset('storage/' .  $blog->blog_image) }}" alt="Temple Image" class="temple-image">
                <div class="meta">
                    <h1>{{$blog->blog_title}}</h1>
                    <span><i class="fas fa-user"></i> Posted By: SANATAN</span>
                    <span><i class="fas fa-calendar-alt"></i> Posted Date: 21-02-2025</span>
                    <span><i class="fas fa-eye"></i> Read By: 0</span>

                </div>
            </div>
            <div class="description">
            {{$blog->description}}


                </p>
            </div>
        </div>
    </div>
@endsection


