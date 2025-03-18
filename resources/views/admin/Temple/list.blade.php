{{-- resources/views/temple/list.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/temple/temple.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="temple-list">
                <div class="add-button-container">
                    <form class="search-form" action="#">
                        <input type="text" name="search" placeholder="Search Temple..." class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </form>
                    <a href="{{route('admin.temple.add')}}" class="add-button">+ Add Temple</a>
                </div>
                <table class="temple-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Temple Name</th>
                            <th>Temple Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($temp_list as $value)
                        <tr>
                        <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' .  $value->photo) }}" alt="Temple Image" class="temple-image">
                            </td>
                            <td class="description">
                            {{ $value->description }}</td>
                            <td class="action-buttons">
                            <a href="{{ route('admin.temple.view', $value->id) }}" class="action-button view">View</a>

                                <a href="#" class="action-button edit">Edit</a>
                                <a href="#" class="action-button delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
