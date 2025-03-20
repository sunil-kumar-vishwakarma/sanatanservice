@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\g-setting\index.css') }}">
    <link rel="stylesheet" href="{{ asset('css\g-setting\pages.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/videos.css') }}"> --}}

    <div class="container">
        <main class="main-content">
            <div class="save-button-container">
                {{-- <a href="#" class="save-button">Save</a> --}}
            </div>
            <section class="settings-management">
                <div class="settings-categories">
                    <div class="category">
                        <h3>
                            <a href="{{ route('admin.g-setting.general') }}"
                                class="action-button {{ Request::is('admin/g-setting/general') || Request::is('admin/g-setting') ? 'active' : '' }}">
                                General
                            </a>
                        </h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.payments') }}"
                                class="action-button {{ Request::is('admin/g-setting/payments') ? 'active' : '' }}">Payments</a>
                        </h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.social_link') }}"
                                class="action-button {{ Request::is('admin/g-setting/social_link') ? 'active' : '' }}">Social
                                Link</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.third_party_package') }}"
                                class="action-button {{ Request::is('admin/g-setting/third_party_package') ? 'active' : '' }}">Third
                                Party Package</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.master_image') }}"
                                class="action-button {{ Request::is('admin/g-setting/master_image') ? 'active' : '' }}">Master
                                Image</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.website_config') }}"
                                class="action-button {{ Request::is('admin/g-setting/website_config') ? 'active' : '' }}">Website
                                Config</a></h3>
                    </div>
                </div>
            </section>
        </main>

        <div class="container-settings">
            {{-- <h2 class="heading-main">Genaral Settings</h2> --}}

            <div class="image-wrapper">
                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Astroshop</label>
                        <img src="http://jdresearchcenter.com/public/storage/images/Astromall1711688425.png"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>

                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Daily Horoscope</label>
                        <img src="http://jdresearchcenter.com/public/storage/images/DailyHoroscope1711688425.png"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>

                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Kundali</label>
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>
                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Kundali Matching</label>
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>
                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Today Panchang</label>
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>
                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Admin Logo</label>
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>
                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Category</label>
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>
                <div class="image-container">
                    <div class="image-item">
                        <label class="label-text">Blog</label>
                        <img src="https://www.pdfslider.com/storage/article_image/60fa9647057ec_1627035207.jpg"
                            alt="Thumbnail" class="image-thumbnail">
                        <input type="file" class="input-field" name="brand_intro_video">
                    </div>
                </div>
            </div>

        </div>
        <style>
            .image-wrapper {
                display: flex;
                flex-wrap: wrap;
                gap: 80px;
                justify-content: center;
                margin-top: 15px;
            }

            .image-container {
                width: calc(33.33% - 20px);
                /* ✅ Ensure it fits properly */
                max-width: calc(33.33% - 20px);
                padding: 15px;
                border: 2px solid #ddd;
                border-radius: 10px;
                background: #f9f9f9;
                text-align: center;
            }


            .image-item {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .label-text {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 8px;
                color: #333;
            }

            .image-thumbnail {
                width: 200px;
                /* ✅ Image size */
                height: 200px;
                object-fit: cover;
                border-radius: 10px;
                /* border: 2px solid #ccc; */
                margin-bottom: 30px;
                margin-top: 10px;
            }

            .input-field {
                width: 100%;
                padding: 8px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background: #fff;
                cursor: pointer;
            }

            /* ✅ Responsive Styling */
            @media (max-width: 1024px) {
                .image-container {
                    flex: 1 1 calc(50% - 20px);
                    /* ✅ 2 items per row */
                    max-width: calc(50% - 20px);
                }
            }

            @media (max-width: 768px) {
                .image-container {
                    flex: 1 1 100%;
                    /* ✅ 1 item per row */
                    max-width: 100%;
                }
            }
        </style>
    @endsection
