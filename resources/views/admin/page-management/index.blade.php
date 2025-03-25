{{-- resources/views/pages/index.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\page-managment.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="videos-list">
                <div class="videos-container">
                    <div class="video-item">
                    @foreach($pages as $page)
                    @if($page->type == 'privacy')
                        <div class="video-details">
                            
                            <h2>{{$page->title}}</h2>
                            <p>{!! $page->description !!}</p>
                           
                            <!-- <h2>Privacy Policy</h2> -->
                            <!-- <p>This Privacy Policy is meant to help you understand what data we collect, why we collect it,
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
                            </p> -->
                            
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                                <div class="switch-container">
                                    <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $page->id }}" {{ $page->isActive == '1' ? 'checked' : '0' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="action-buttons">
                                <a href="#" class="action-button edit" data-id="{{ $page->id }}" data-title="{{ $page->title }}" data-type="{{ $page->type }}" data-description="{{ $page->description }}"  onclick="openPopup()">Edit</a>
                              
                                    <!-- <a href="#" class="action-button edit" onclick="openPopup()">Edit</a> -->
                                </div>
                            </div>
                        </div>
                        @endif
                            @endforeach
                    </div>

                    {{-- 2nd card --}}
                    <div class="video-item">
                    @foreach($pages as $page)
                    @if($page->type == 'terms')
                        <div class="video-details">
                        
                            <h2>{{$page->title}}</h2>
                            <p>{!! $page->description !!}</p>
                           
                            <!-- <h2>Terms & Conditions</h2> -->
                            <!-- <p>By downloading or using the app, these terms will automatically apply to you – you should
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
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p> -->
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                                <div class="switch-container">
                                    <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $page->id }}" {{ $page->isActive == '1' ? 'checked' : '0' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="action-buttons">
                                <a href="#" class="action-button edit" data-id="{{ $page->id }}" data-title="{{ $page->title }}" data-type="{{ $page->type }}" data-description="{{ $page->description }}"  onclick="openPopup()">Edit</a>
                              
                                    <!-- <a href="#" class="action-button edit" onclick="openPopup()">Edit</a> -->
                                </div>
                            </div>
                        </div>

                        @endif

                    @endforeach
                    </div>

                    {{-- 3rd card --}}
                    
                    <div class="video-item">
                    @foreach($pages as $page)
                      @if($page->type == 'aboutus')
                        <div class="video-details">
                        
                            
                            <h2>{{$page->title}}</h2>
                            <p>{!! $page->description !!}</p>
                           

                           

                            <!-- <h2>About Us</h2> -->
                            <!-- <p>By downloading or using the app, these terms will automatically apply to you – you should
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
                                copy, or modify the app, any part of the app, or our trademarks in any way.</p> -->
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                                <div class="switch-container">
                                <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $page->id }}" {{ $page->isActive == '1' ? 'checked' : '0' }}>
                                    <span class="slider"></span>
                                </label>
                                </div>
                                <div class="action-buttons">
                                    <a href="#" class="action-button edit" data-id="{{ $page->id }}" data-title="{{ $page->title }}" data-type="{{ $page->type }}" data-description="{{ $page->description }}"  onclick="openPopup()">Edit</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
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
            <form id="audioForm" action="{{ route('admin.page-management.update') }}" method="POST" enctype="multipart/form-data">
            @csrf 
                <label for="title">Title:</label>
                <input type="text" id="bannerId" name="bannerId">

                <input type="text" id="title" name="title">

                <label for="bannerType">Select Type</label>
                <select id="type" name="type">
                    <option value="privacy">Privacy Policy</option>
                    <option value="terms">Term and Conditions</option>
                    <option value="aboutus">About us</option>
                </select>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="34"></textarea>

                <button type="submit" class="save-btn">Save</button>
            </form>
        </div>
    </div>
    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#description'), {
        //         height: 300
        //     })
        //     .then(editor => {
        //         editor.editing.view.change(writer => {
        //             writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
        //         });
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });

            
            document.addEventListener("DOMContentLoaded", function () {

            const popupOverlay = document.getElementById("popupForm");
            const title = document.getElementById("title");
            const type = document.getElementById("type");
            const description = document.getElementById("description");
            // const bannerTypeSelect = document.getElementById("bannerType");
            // let imagePreview = document.getElementById("bannerImagePreview");


        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
        }

        
        document.querySelector(".close-btn").addEventListener("click", closePopup);

        // Edit button ke click par popup open
        document.querySelectorAll(".action-button.edit").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            openPopup();

            const bannerId = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            let type = this.getAttribute('data-type');
            
            // document.getElementById('type').value = type;
            const description = this.getAttribute('data-description');
            document.getElementById('description').value = description;

            
            document.getElementById('title').value = title;
            document.getElementById('type').value = type;
            document.getElementById('bannerId').value = bannerId;
            
            });
        });
    });
    </script>



<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-status").forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            let bannerId = this.getAttribute("data-id");
            let newStatus = this.checked ? "1" : "0"; // Toggle between Active and Deactive

            fetch("/admin/pagemanagement/updateStatus", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ id: bannerId, status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Status updated:", data);
                } else {
                    console.error("Failed to update status");
                }
            })
            .catch(error => console.error("Error updating status:", error));
        });
    });
});
</script>

@endsection
