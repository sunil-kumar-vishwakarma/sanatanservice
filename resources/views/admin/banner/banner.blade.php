@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/videos.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="videos-list">
                <div class="add-button-container">
                    <a href="#" class="add-button">+ Add Banner</a>
                </div>
                <div class="videos-container">
                    <div class="video-item">
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: 2024-03-01
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: 2024-03-10
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> Astrologer
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
                    <div class="video-item">
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: 2024-03-01
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: 2024-03-10
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> Astroshop
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
                    <div class="video-item">
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: 2024-03-01
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: 2024-03-10
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> Astrologer
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
                    <div class="video-item">
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: 2024-03-01
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: 2024-03-10
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> Astroshop
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
                    <div class="video-item">
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: 2024-03-01
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: 2024-03-10
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> Astrologer
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
                    <div class="video-item">
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail">
                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: 2024-03-01
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: 2024-03-10
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> Astroshop
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

                </div>
            </section>
        </main>
    </div>

    <!-- Edit Banner Popup -->
    <!-- Edit Button -->

    <!-- Popup Form -->
    <div id="popupForm" class="popup-overlay">
        <div class="popup-box">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Edit Banner</h2>
            <form>
                <label for="bannerImage">Banner Image</label>
                <input type="file" id="bannerImage" name="bannerImage">

                <label for="fromDate">From Date</label>
                <input type="date" id="fromDate" name="fromDate" value="2024-02-28">

                <label for="toDate">To Date</label>
                <input type="date" id="toDate" name="toDate" value="2029-01-02">

                <label for="bannerType">Banner Type</label>
                <select id="bannerType" name="bannerType">
                    <option>Astrologer</option>
                    <option>Astroshop</option>
                </select>

                <button type="submit" class="save-btn">Save</button>
                {{-- <button type="button" class="close-btn" onclick="closePopup()">Cancel</button> --}}
            </form>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const popupOverlay = document.getElementById("popupForm");

    function openPopup() {
        popupOverlay.style.display = "flex";
    }

    function closePopup() {
        popupOverlay.style.display = "none";
    }

    // Popup ke bahar click karne se close hoga
    popupOverlay.addEventListener("click", function (event) {
        if (event.target === popupOverlay) {
            closePopup();
        }
    });

    // Close button ke liye event listener
    document.querySelector(".close-btn").addEventListener("click", closePopup);

    // Edit button ke click par popup open
    document.querySelectorAll(".action-button.edit").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            openPopup();
        });
    });
});

    </script>
@endsection
