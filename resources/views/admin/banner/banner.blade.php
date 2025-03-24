@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/videos.css') }}">
    <div class="container">
        <main class="main-content">
            <section class="videos-list">
                <div class="add-button-container">
                    <a href="{{route('admin.banner.create')}}" class="add-button">+ Add Banner</a>
                </div>
                <div class="videos-container">
                    @foreach($banners as $banner)
                    <div class="video-item">
                        <!-- <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="video-thumbnail"> -->
                            <img src="{{ asset('storage/' .  $banner->banner_image) }}"
                            alt="Thumbnail" class="video-thumbnail">

                        <div class="video-details">
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> From: {{$banner->from_date}}
                            </p>
                            <p class="video-date">
                                <i class="fas fa-calendar-alt"></i> To: {{$banner->to_date}}
                            </p>
                            <p class="video-astro">
                                <i class="fas fa-user"></i> {{$banner->banner_type}}
                            </p>
                        </div>
                        <div class="video-actions-container">
                            <div class="video-actions">
                            
                            <div class="switch-container">
                                <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $banner->id }}" {{ $banner->status == 'Active' ? 'checked' : 'Inactive' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>


                                <div class="action-buttons">
                                    <a href="#" class="action-button edit" data-id="{{ $banner->id }}" data-image="{{ asset('storage/' . $banner->banner_image) }}" data-from-date="{{ $banner->from_date }}" data-to-date="{{ $banner->to_date }}" data-type="{{ $banner->banner_type }}"  onclick="openPopup()">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>


        

                    @endforeach
                    <!-- <div class="video-item">
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
                    </div> -->

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
            <form id="audioForm" action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <label for="bannerImage">Banner Image</label>
                <input type="hidden" id="bannerId" name="bannerId">
                <input type="file" id="bannerImage" name="bannerImage">
                <img id="bannerImagePreview" src="" width="100px;" height="100px;"/>


                <label for="fromDate">From Date</label>
                <input type="date" id="fromDate" name="fromDate">

                <label for="toDate">To Date</label>
                <input type="date" id="toDate" name="toDate">

                <label for="bannerType">Banner Type</label>
                <select id="bannerType" name="bannerType">
                    <option value="Astrologer">Astrologer</option>
                    <option value="Astroshop">Astroshop</option>
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
    const bannerImageInput = document.getElementById("bannerImage");
    const fromDateInput = document.getElementById("fromDate");
    const toDateInput = document.getElementById("toDate");
    const bannerTypeSelect = document.getElementById("bannerType");
    let imagePreview = document.getElementById("bannerImagePreview");

    // const popupOverlay = document.getElementById("popupForm");

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

            const bannerId = this.getAttribute('data-id');
            const bannerImage = this.getAttribute('data-image');
            const fromDate = this.getAttribute('data-from-date');
            const toDate = this.getAttribute('data-to-date');
            const bannerType = this.getAttribute('data-type');
// alert(fromDate);
            // Populate form fields
            document.getElementById('bannerId').value = bannerId;

            // Populate the form fields
            document.getElementById("popupForm").dataset.id = bannerId; // Store ID for submission
            fromDateInput.value = fromDate;
            toDateInput.value = toDate;
            bannerTypeSelect.value = bannerType;

            // Show Image Preview
            if (!imagePreview) {
                imagePreview = document.createElement("img");
                imagePreview.id = "bannerImagePreview";
                imagePreview.style = "max-width: 100px; margin-top: 10px;";
                bannerImageInput.insertAdjacentElement("afterend", imagePreview);
            }
            imagePreview.src = bannerImage;

            // document.getElementById('bannerImage').value = bannerImage;
            // document.getElementById('fromDate').value = fromDate;
            // document.getElementById('toDate').value = toDate;
            // document.getElementById('bannerType').value = bannerType;

        });
    });
});

    </script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-status").forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            let bannerId = this.getAttribute("data-id");
            let newStatus = this.checked ? "Active" : "Inactive"; // Toggle between Active and Deactive

            fetch("/admin/banner/update-status", {
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
