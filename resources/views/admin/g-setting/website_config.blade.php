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

            <form action="#" method="POST" enctype="multipart/form-data">
                <h3 class="heading-main">
                    Firebase
                    <i class="fas fa-info-circle info-icon" title="Set Firebase Key Secret (Use for Chat , Otp)."></i>
                </h3>
                <div class="form-group">
                    <label class="label-text">Firebase Api Key</label>
                    <input type="text" class="input-field" name="Api_Key">
                </div>

                <div class="form-group">
                    <label class="label-text">Firebase Database Url</label>
                    <input type="text" class="input-field" name="Database_Url">

                </div>

                <div class="form-group">
                    <label class="label-text">Firebase Auth Domain</label>
                    <input type="text" class="input-field" name="Auth_Domain">
                </div>
                <div class="form-group">
                    <label class="label-text">Firebase Project Id</label>
                    <input type="text" class="input-field" name="Project_Id">
                </div>
                <div class="form-group">
                    <label class="label-text">Firebase Storage Bucket</label>
                    <input type="text" class="input-field" name=" Storage_Bucket">
                </div>
                <div class="form-group">
                    <label class="label-text">Firebase Messaging Sender Id</label>
                    <input type="text" class="input-field" name="Sender_Id">
                </div>
                <div class="form-group">
                    <label class="label-text">Firebase App Id</label>
                    <input type="text" class="input-field" name="Firebase_App_Id">
                </div>
                <div class="form-group">
                    <label class="label-text">Firebase Measurement Id</label>
                    <input type="text" class="input-field" name="Firebase_Measurement_Id">
                </div>
                <br>
                <h3 class="heading-main">
                    Site Details
                </h3>
                <div class="form-group">
                    <label class="label-text">Site Mobile Number</label>
                    <input type="text" class="input-field" name="Site_Mobile_Number">
                </div>
                <div class="form-group">
                    <label class="label-text">Site Email</label>
                    <input type="text" class="input-field" name="Site_Email">
                </div>
                <div class="form-group">
                    <label class="label-text">Site Address</label>
                    <input type="text" class="input-field" name="Site_Address">
                </div>


                <button type="submit" class="save-btn">Save Settings</button>
            </form>
        </div>
    </div>
@endsection
