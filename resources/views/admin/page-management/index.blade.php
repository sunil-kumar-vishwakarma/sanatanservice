{{-- resources/views/pages/index.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\page-managment.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="videos-list">
                <div class="videos-container">
                    <div class="video-item">
                        <div class="video-details">
                            <h2>Privacy Policy</h2>
                            <p>This Privacy Policy is meant to help you understand what data we collect, why we collect it,
                                and what we do with it. This is important; we hope you will take the time to read it
                                carefully.</p>
                            <p>
                                By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.
                            </p>
                            <p>
                                By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.
                            </p>
                            <p>
                                By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.
                            </p>
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
                                    <a href="#" class="action-button edit" onclick="openPopup()">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 2nd card --}}
                    <div class="video-item">
                        <div class="video-details">
                            <h2>Terms & Conditions</h2>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
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
                                    <a href="#" class="action-button edit" onclick="openPopup()">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 3rd card --}}
                    <div class="video-item">
                        <div class="video-details">
                            <h2>About Us</h2>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
                            <p>By downloading or using the app, these terms will automatically apply to you – you should
                                make sure therefore that you read them carefully before using the app. You’re not allowed to
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p>
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
                                    <a href="#" class="action-button edit" onclick="openPopup()">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </main>
    </div>

    <!-- Edit Banner Popup -->
    <!-- Popup Form -->
    <div id="popupForm" class="popup-overlay" style="display:none;">
        <div class="popup-box">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Edit Page</h2>
            <form>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">

                <label for="bannerType">Select Type</label>
                <select id="bannerType" name="bannerType">
                    <option>Privacy Policy</option>
                    <option>Term and Conditions</option>
                    <option>About us</option>
                </select>

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
    </div>
    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                height: 300 // Yeh option directly nahi hota CKEditor me, isliye CSS lagayenge
            })
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });

        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
@endsection
