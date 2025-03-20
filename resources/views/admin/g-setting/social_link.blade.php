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
                <div class="form-group">
                    <label class="label-text">Apple Link</label>
                    <input type="text" class="input-field" name="Apple_Link">
                </div>

                <div class="form-group">
                    <label class="label-text">Website</label>
                    <input type="text" class="input-field" name="Website">

                </div>

                <div class="form-group">
                    <label class="label-text">Youtube Link</label>
                    <input type="text" class="input-field" name="Youtube_Link">
                </div>
                <div class="form-group">
                    <label class="label-text">Facebook Link</label>
                    <input type="text" class="input-field" name="Facebook_Link">
                </div>
                <div class="form-group">
                    <label class="label-text">LinkedIn Link</label>
                    <input type="text" class="input-field" name="LinkedIn_Link">
                </div>
                <div class="form-group">
                    <label class="label-text">Pinterest Link</label>
                    <input type="text" class="input-field" name="Pinterest_Link">
                </div>
                <div class="form-group">
                    <label class="label-text">Instagram Link</label>
                    <input type="text" class="input-field" name="Instagram_ink">
                </div>


                <button type="submit" class="save-btn">Save Settings</button>
            </form>
        </div>
    </div>
@endsection
