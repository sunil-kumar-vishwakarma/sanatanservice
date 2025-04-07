@extends('admin.layout')

@section('content')
    {{-- @include('admin.alerts') --}}
    <link rel="stylesheet" href="{{ asset('css/temple/temple.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="audio-management">
                <h2 style="width: 300px;margin-top: 35px;">Add New Banner </h2><a href="{{route('admin.banner.banner')}}" class="add-button" style="float: right; margin-top: -56px;">  <i class="fas fa-arrow-left"></i> Back Banner</a><br><br>
                <form id="audioForm" action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="thumbnail">Banner Image:</label>
                        <input type="file" id="banner_image" name="banner_image" class="form-control" accept="image/*"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="audio_name">From Date:</label>
                        <input type="date" id="from_date" name="from_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="audio_name">To Date:</label>
                        <input type="date" id="to_date" name="to_date" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="audio_name">Banner Type:</label>
                        <select data-placeholder="Select categories" class="form-control" id="banner_type" name="banner_type">
                                <option value="" disabled="" selected="" required="">--Select Banner Type--</option>
                                <option id="bannerTypeId" value="Astrologer" required="">Astrologer</option>
                                <option id="bannerTypeId" value="Astroshop" required="">Astroshop</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="audio_name">Banner Status:</label>
                        <input type="text" id="blog_status" name="blog_status" class="form-control" required>
                    </div> -->

                    <div class="form-group">
                        <button type="submit" class="btn-primary action-button add ">Add Banner</button>
                    </div>
                </form>
            </section>
</main>
</div>

@endsection
