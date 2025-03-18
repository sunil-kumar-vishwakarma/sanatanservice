{{-- resources/views/videos/index.blade.php --}}
@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/videos.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="videos-list">
                <div class="add-button-container">
                    <a href="#" class="add-button">+ Add Video</a>
                </div>
                <div class="videos-container">
                    <div class="video-item">
                        <img src="{{ asset('https://s7ap1.scene7.com/is/image/incredibleindia/konark-temple-puri-odisha-2-attr-hero?qlt=82&ts=1726674676369') }}"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <a href="https://www.youtube.com/watch?v=Z-Bpli0y-Ak" target="_blank" class="video-link" data-full-link="https://www.youtube.com/watch?v=Z-Bpli0y-Ak">
                                https://www.youtube.com/watch?v=Z-Bpli0y-Ak
                            </a>
                            <p class="video-title">Daily Horoscope</p>
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                                <div class="switch-container">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="action-buttons">
                                    <a href="#" class="action-button edit">Edit</a>
                                    <a href="#" class="action-button delete">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-item">
                        <img src="{{ asset('https://s7ap1.scene7.com/is/image/incredibleindia/konark-temple-puri-odisha-2-attr-hero?qlt=82&ts=1726674676369') }}"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <a href="https://www.youtube.com/watch?v=Z-Bpli0y-Ak" target="_blank" class="video-link" data-full-link="https://www.youtube.com/watch?v=Z-Bpli0y-Ak">
                                https://www.youtube.com/watch?v=Z-Bpli0y-Ak
                            </a>
                            <p class="video-title">Daily Horoscope</p>
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                                <div class="switch-container">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="action-buttons">
                                    <a href="#" class="action-button edit">Edit</a>
                                    <a href="#" class="action-button delete">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-item">
                        <img src="{{ asset('https://s7ap1.scene7.com/is/image/incredibleindia/konark-temple-puri-odisha-2-attr-hero?qlt=82&ts=1726674676369') }}"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <a href="https://www.youtube.com/watch?v=Z-Bpli0y-Ak" target="_blank" class="video-link" data-full-link="https://www.youtube.com/watch?v=Z-Bpli0y-Ak">
                                https://www.youtube.com/watch?v=Z-Bpli0y-Ak https://www.youtube.com/watch?v=Z-Bpli0y-Ak
                            </a>
                            <p class="video-title">Daily Horoscope</p>
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                                <div class="switch-container">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="action-buttons">
                                    <a href="#" class="action-button edit">Edit</a>
                                    <a href="#" class="action-button delete">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.video-link');
            links.forEach(link => {
                truncateText(link, 15); // Limit to 15 words
            });
        });

        function truncateText(element, wordLimit) {
            const words = element.textContent.split(' ');
            if (words.length > wordLimit) {
                element.textContent = words.slice(0, wordLimit).join(' ') + '...';
                element.setAttribute('data-full-link', words.join(' '));
                element.addEventListener('mouseover', function() {
                    this.title = this.getAttribute('data-full-link');
                });
            }
        }
    </script>
@endsection
