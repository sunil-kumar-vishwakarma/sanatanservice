@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\g-setting\index.css') }}">
    <link rel="stylesheet" href="{{ asset('css\g-setting\pages.css') }}">
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

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="label-text">Customer App Name</label>
                    <input type="text" class="input-field" name="customer_app_name">
                </div>

                <div class="form-group">
                    <label class="label-text">App Language</label>
                    <input type="text" class="input-field" name="app_language">

                </div>

                <div class="form-group">
                    <label class="label-text">Partner App Name</label>
                    <input type="text" class="input-field" name="partner_app_name">
                </div>

                <div class="form-group">
                    <label class="label-text">Enable first chat/call free</label>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked> Yes
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> No
                    </div>
                </div>

                <div class="form-group">
                    <label class="label-text">Upload Brand Intro Video</label>
                    <input type="file" class="input-field" name="brand_intro_video">
                </div>

                <div class="form-group">
                    <label class="label-text">Currency</label>
                    <input type="text" class="input-field" name="currency" value="USD">
                </div>

                <div class="form-group">
                    <label class="label-text">Currency Symbol</label>
                    <input type="text" class="input-field" name="currency_symbol" value="$">
                </div>

                <div class="form-group">
                    <label class="label-text">Upload Top Banner Image</label>
                    <input type="file" class="input-field" name="top_banner">
                </div>

                <div class="form-group">
                    <label class="label-text">Web Language</label>
                    <input type="text" class="input-field" name="web_language">

                </div>
                <br>
                <h3 class="heading-main">
                    Commission Settings
                    <i class="fas fa-info-circle info-icon" title="Set commission percentages for different services."></i>
                </h3>


                <div class="form-group">
                    <label class="label-text">Chat Commission (%)</label>
                    <input type="number" class="input-field" name="chat_commission" value="47">
                </div>

                <div class="form-group">
                    <label class="label-text">Call Commission (%)</label>
                    <input type="number" class="input-field" name="call_commission" value="47">
                </div>

                <div class="form-group">
                    <label class="label-text">Report Commission (%)</label>
                    <input type="number" class="input-field" name="report_commission" value="47">
                </div>

                <div class="form-group">
                    <label class="label-text">Video Call Commission (%)</label>
                    <input type="number" class="input-field" name="video_commission" value="47">
                </div>

                <div class="form-group">
                    <label class="label-text">Default Time (in seconds)</label>
                    <input type="number" class="input-field" name="default_time" value="300">
                </div>

                <div class="form-group">
                    <label class="label-text">Gift Commission (%)</label>
                    <input type="number" class="input-field" name="gift_commission" value="47">
                </div>

                <button type="submit" class="save-btn">Save Settings</button>
            </form>
        </div>
    </div>
@endsection
