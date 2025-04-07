{{-- resources/views/temple/details.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/temple/temple-view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addbutton.css') }}">
    <div class="container">
        <div class="temple-details">
            <div class="back-button-container">
                <a href="{{ route('admin.temple.list') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <br>
            </div>
            <div class="image-meta">
                <img src="{{ asset('storage/' . $temple->photo) }}" alt="Temple Image" class="temple-image">
                <div class="meta">
                    <h1>{{ $temple->name }}</h1>
                    <span><i class="fas fa-user"></i> Posted By: SANATAN</span>
                    <span><i class="fas fa-calendar-alt"></i> Posted Date: 21-02-2025</span>
                    <span><i class="fas fa-eye"></i> Read By: 0</span>

                </div>
            </div>
            <div class="description">
                {{ $temple->description }}

                <!-- <p>The Golden Temple, also known as Harmandir Sahib, is a prominent Sikh gurdwara located in the city of
                        Amritsar, Punjab, India. It is a symbol of faith, spirituality, and equality. The temple is made of
                        marble and gold, giving it a radiant appearance. It is surrounded by a sacred pool of water known as the
                        Amrit Sarovar.</p>
                    <p>The temple is open to people of all religions and offers free meals to thousands of visitors every day.
                        The Golden Temple is not only a place of worship but also a symbol of the Sikh community's commitment to
                        service and equality.</p>
                    <p>The temple's architecture is a blend of Hindu and Islamic styles, reflecting the syncretic nature of
                        Sikhism. The temple's main building is a two-story structure with a golden dome and intricate carvings.
                        The temple's interior is adorned with beautiful artwork and scriptures.</p>
                    <p>The temple is open to people of all religions and offers free meals to thousands of visitors every day.
                        The Golden Temple is not only a place of worship but also a symbol of the Sikh community's commitment to
                        service and equality.</p>
                    <p>The temple's architecture is a blend of Hindu and Islamic styles, reflecting the syncretic nature of
                        Sikhism. The temple's main building is a two-story structure with a golden dome and intricate carvings.
                        The temple's interior is adorned with beautiful artwork and scriptures.</p>
                    <p>The temple is open to people of all religions and offers free meals to thousands of visitors every day.
                        The Golden Temple is not only a place of worship but also a symbol of the Sikh community's commitment to
                        service and equality.</p>
                    <p>The temple's architecture is a blend of Hindu and Islamic styles, reflecting the syncretic nature of
                        Sikhism. The temple's main building is a two-story structure with a golden dome and intricate carvings.
                        The temple's interior is adorned with beautiful artwork and scriptures.</p>
                    <p>The temple is open to people of all religions and offers free meals to thousands of visitors every day.
                        The Golden Temple is not only a place of worship but also a symbol of the Sikh community's commitment to
                        service and equality.</p>
                    <p>The temple's architecture is a blend of Hindu and Islamic styles, reflecting the syncretic nature of -->
                Sikhism. The temple's main building is a two-story structure with a golden dome and intricate carvings.
                The temple's interior is adorned with beautiful artwork and scriptures.</p>
            </div>
        </div>
    </div>
@endsection
