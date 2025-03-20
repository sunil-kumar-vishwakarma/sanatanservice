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
                    <!-- <div class="category">
                        <h3><a href="{{ route('admin.g-setting.general') }}"
                                class="action-button {{ Request::is('admin/g-setting/general') ? 'active' : '' }}">General</a>
                        </h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.payments') }}"
                                class="action-button {{ Request::is('admin/g-setting/payments') ? 'active' : '' }}">Payments</a>
                        </h3>
                    </div> -->
                    <!-- <div class="category">
                        <h3><a href="{{ route('admin.g-setting.social_link') }}"
                                class="action-button {{ Request::is('admin/g-setting/social_link') ? 'active' : '' }}">Social
                                Link</a></h3>
                    </div> -->

                    <ul class="nav nav-link-tabs" role="tablist" style="display: flex">
                @foreach ($flagGroup as $group)
                    <!-- <li id="{{ $loop->index }}" class="nav-item flex-1 {{ $loop->first ? 'active' : '' }}"
                        role="presentation">
                        <button class="nav-link w-full py-2 {{ $loop->first ? 'active' : '' }}" data-tw-toggle="pill"
                            data-tw-target="#{{ $group->flagGroupName }}" type="button" role="tab"
                            aria-controls="{{ $group->flagGroupName }}" aria-selected="true">
                            {{ $group->flagGroupName }}
                        </button>
                    </li> -->
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.third_party_package') }}"
                                class="action-button {{ Request::is('admin/g-setting/third_party_package') ? 'active' : '' }}">{{ $group->flagGroupName }}</a></h3>
                    </div>
                @endforeach
            </ul>

                    <!-- <div class="category">
                        <h3><a href="{{ route('admin.g-setting.third_party_package') }}"
                                class="action-button {{ Request::is('admin/g-setting/third_party_package') ? 'active' : '' }}">Third
                                Party Package</a></h3>
                    </div> -->
                    <!-- <div class="category">
                        <h3><a href="{{ route('admin.g-setting.master_image') }}"
                                class="action-button {{ Request::is('admin/g-setting/master_image') ? 'active' : '' }}">Master
                                Image</a></h3>
                    </div>
                    <div class="category">
                        <h3><a href="{{ route('admin.g-setting.website_config') }}"
                                class="action-button {{ Request::is('admin/g-setting/website_config') ? 'active' : '' }}">Website
                                Config</a></h3>
                    </div> -->
                </div>
            </section>
        </main>

        <div class="container-settings">
            
            <!-- <form action="#" method="POST" enctype="multipart/form-data">
                <h3 class="heading-main">
                    Agora
                    <i class="fas fa-info-circle info-icon"
                        title="Set Agora Key Secret (Use for LiveChat,AudioCall,VideoCall)(https://console.agora.io/)."></i>
                </h3>
                <div class="form-group">
                    <label class="label-text">Agora Key</label>
                    <input type="text" class="input-field" name="customer_app_name">
                </div>



                <div class="form-group">
                    <label class="label-text">Agora Secret</label>
                    <input type="text" class="input-field" name="partner_app_name">
                </div>
                <div class="form-group">
                    <label class="label-text">Agora App Certificate</label>
                    <input type="text" class="input-field" name="app_language">

                </div>
                <div class="form-group">
                    <label class="label-text">Agora AppId</label>
                    <input type="text" class="input-field" name="partner_app_name">
                </div>
                <br>
                <h3 class="heading-main">
                    Select Bucket
                    <i class="fas fa-info-circle info-icon" title="Select Bucket to store App data."></i>
                </h3>
                <div class="form-group">
                    <label class="label-text">Select the Bucket Provider</label>
                    <div class="radio-group">
                        <input type="radio" class="radio-btn" name="first_chat_call_free" value="Yes" checked> Google Bucket
                        {{-- <input type="radio" class="radio-btn" name="first_chat_call_free" value="No"> AWS Bucket --}}
                    </div>
                </div>
                <br>
                <h3 class="heading-main">
                    Google Bucket
                    <i class="fas fa-info-circle info-icon" title="Use For Store Call Recording."></i>
                </h3>

                <div class="form-group">
                    <label class="label-text">Google Access Key</label>
                    <input type="text" class="input-field" name="Google_Access_Key">
                </div>
                <div class="form-group">
                    <label class="label-text">Google Secret Key</label>
                    <input type="text" class="input-field" name="Google_secret_Key">
                </div>
                <div class="form-group">
                    <label class="label-text">Google Bucket Name</label>
                    <input type="text" class="input-field" name="Google_bucket_Key">
                </div>


                <br>
                <h3 class="heading-main">
                    Horoscope API
                    <i class="fas fa-info-circle info-icon" title="(Use For Get Kundali Detail)."></i>
                </h3>


                <div class="form-group">
                    <label class="label-text">Astrology Api UserId</label>
                    <input type="number" class="input-field" name="Astrology_Api">
                </div>
                <div class="form-group">
                    <label class="label-text">AstrologyApi Key</label>
                    <input type="number" class="input-field" name="Astrology_key">
                </div>
                <div class="form-group">
                    <label class="label-text">Vedic Astrology Api</label>
                    <input type="number" class="input-field" name="vedic_Astrology_Api">
                </div>

                <br>
                <h3 class="heading-main">
                    Google Map Api
                    <i class="fas fa-info-circle info-icon" title="Set Google Api (Use for Location Fetch)."></i>
                </h3>

                <div class="form-group">
                    <label class="label-text">Google Map Api Key</label>
                    <input type="number" class="input-field" name="Google_Map_Api_Key">
                </div>

                <br>
                <h3 class="heading-main">
                    OTP Less
                    <i class="fas fa-info-circle info-icon" title="Set OTP Less keys (Use for whatsapp, gmail login)."></i>
                </h3>


                <div class="form-group">
                    <label class="label-text">Otp Less App Id</label>
                    <input type="number" class="input-field" name="otp_appID">
                </div>
                <div class="form-group">
                    <label class="label-text">Otp Less Client Id</label>
                    <input type="number" class="input-field" name="otp_clientID">
                </div>
                <div class="form-group">
                    <label class="label-text">Otp Less Secret Key</label>
                    <input type="number" class="input-field" name="otp_secretkey">
                </div>


                <button type="submit" class="save-btn">Save Settings</button>
            </form> -->

     <form method="POST" enctype="multipart/form-data" id="edit-form">
            @csrf
        <h2 class="d-inline intro-y text-lg font-medium mt-10">Settings</h2>
        <button type="submit"class="btn btn-primary shadow-md mr-2 d-inline addbtn mt-10">Save
        </button>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible ">
            </div>
        </div>
        <div id="link-tab" class="p-3">
            <!-- <ul class="nav nav-link-tabs" role="tablist" style="display: flex">
                @foreach ($flagGroup as $group)
                    <li id="{{ $loop->index }}" class="nav-item flex-1 {{ $loop->first ? 'active' : '' }}"
                        role="presentation">
                        <button class="nav-link w-full py-2 {{ $loop->first ? 'active' : '' }}" data-tw-toggle="pill"
                            data-tw-target="#{{ $group->flagGroupName }}" type="button" role="tab"
                            aria-controls="{{ $group->flagGroupName }}" aria-selected="true">
                            {{ $group->flagGroupName }}
                        </button>
                    </li>
                @endforeach
            </ul> -->
            <div class="setting tab-content mt-5 mastertab">
                @foreach ($flagGroup as $groupIndex => $group)
                    <div id="{{ $group->flagGroupName }}"
                        class="tab-pane leading-relaxed {{ $loop->first ? 'active' : '' }}" role="tabpanel"
                        aria-labelledby="example-1-tab">
                        @if (count($group->systemFlag) > 0)
                            @foreach ($group->systemFlag as $systemFlagIndex => $systemFlag)
                                @if ($systemFlag->valueType == 'Text')
                                    <div>
                                        <label for="validation-form-2"
                                            class="form-label w-full flex flex-col sm:flex-row mt-2">
                                            {{ $systemFlag->displayName }}
                                            @if ($systemFlag->description)
                                                <a class="systooltip"><i class="fa fa-info-circle w-4 h-4 ml-1"
                                                        style="margin-top:4px"></i>
                                                    <span class="tooltiptext">{{ $systemFlag->description }}</span>
                                                </a>
                                            @endif
                                        </label>
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]"
                                            value="{{ $systemFlag->name }}">
                                        <input onkeypress="return validateJavascript(event);" type="text"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value]"
                                            class="form-control" value="{{ $systemFlag->value }}">
                                    </div>
                                @endif
                                @if ($systemFlag->valueType == 'Number')
                                    <div>
                                        <label for="validation-form-2"
                                            class="form-label w-full flex flex-col sm:flex-row mt-2">
                                            {{ $systemFlag->displayName }}
                                            @if ($systemFlag->description)
                                                <a class="systooltip"><i class="fa fa-info-circle w-4 h-4 ml-1"
                                                        style="margin-top:4px"></i>
                                                    <span class="tooltiptext">{{ $systemFlag->description }}</span>
                                                </a>
                                            @endif
                                        </label>
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]"
                                            value="{{ $systemFlag->name }}">
                                        <input type="number"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value]"
                                            class="form-control" required value="{{ $systemFlag->value }}">
                                    </div>
                                @endif
                                @if ($systemFlag->valueType == 'Radio')
                                    <div>
                                        <label for="validation-form-2"
                                            class="form-label w-full flex flex-col sm:flex-row mt-2">
                                            {{ $systemFlag->displayName }}
                                            @if ($systemFlag->description)
                                                <a class="systooltip"><i class="fa fa-info-circle w-4 h-4 ml-1"
                                                        style="margin-top:4px"></i>
                                                    <span class="tooltiptext">{{ $systemFlag->description }}</span>
                                                </a>
                                            @endif
                                        </label>
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]"
                                            value="{{ $systemFlag->name }}">

                                        @if ($systemFlag->name == 'FirstFreeChat')
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="form-check mr-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value]"
                                                        value='1'
                                                        {{ $systemFlag->value == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-switch-4">Yes</label>
                                                </div>
                                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                                    <input class="form-check-input" type="radio"
                                                        name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value]"
                                                        value='0' {{ $systemFlag->value == '0' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-switch-5">No</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                @if ($systemFlag->valueType == 'File')
                                    <div class="intro-y col-span-12 sm:col-span-6 2xl:col-span-4 xl:col-span-4  d-inline">
                                        <div class="box p-5  mt-2 text-center">
                                            <label for="validation-form-2" class="form-label w-full  mt-2">
                                                {{ $systemFlag->displayName }}
                                            </label>
                                            <input type="hidden"
                                                name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][valueType]"
                                                value="{{ $systemFlag->valueType }}">
                                            <input type="hidden"
                                                name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]"
                                                value="{{ $systemFlag->name }}">
                                            <div class="settingimg">
                                                <img id="{{ $systemFlag->name }}" src="/{{ $systemFlag->value }}"
                                                    width="150px" alt="gift">
                                            </div>
                                            <div>
                                                <input type="file" class="mt-2"
                                                    name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value]"
                                                    id="image" onchange="previews('{{ $systemFlag->name }}')"
                                                    accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($systemFlag->valueType == 'MultiSelect')
                                    <div>
                                        <label for="validation-form-2"
                                            class="form-label w-full flex flex-col sm:flex-row mt-2">
                                            {{ $systemFlag->displayName }}
                                            @if ($systemFlag->description)
                                                <a class="systooltip"><i class="fa fa-info-circle w-4 h-4 ml-1"
                                                        style="margin-top:4px"></i>
                                                    <span class="tooltiptext">{{ $systemFlag->description }}</span>
                                                </a>
                                            @endif
                                        </label>
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]"
                                            value="{{ $systemFlag->name }}">
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][valueType]"
                                            value="{{ $systemFlag->valueType }}">
                                        <select
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value][]"
                                            class="form-control select2 language" multiple
                                            data-placeholder="Choose Language">
                                            @foreach ($language as $lan)
                                                <option value={{ $lan->id }}>
                                                    {{ $lan->languageName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if ($systemFlag->valueType == 'MultiSelectWebLang')
                                @php
                                    // Decode JSON if necessary
                                    $selectedLanguages = json_decode($systemFlag->value, true) ?: [];
                                @endphp
                                <div>
                                    <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row mt-2">
                                        {{ $systemFlag->displayName }}
                                        @if ($systemFlag->description)
                                            <a class="systooltip">
                                                <i class="fa fa-info-circle w-4 h-4 ml-1" style="margin-top:4px"></i>
                                                <span class="tooltiptext">{{ $systemFlag->description }}</span>
                                            </a>
                                        @endif
                                    </label>
                                    <input type="hidden" name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]" value="{{ $systemFlag->name }}">
                                    <input type="hidden" name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][valueType]" value="{{ $systemFlag->valueType }}">
                                    <select name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value][]" class="form-control select2 " multiple data-placeholder="Choose Language">
                                        @foreach ($language as $lan)
                                            <option value="{{ $lan->languageCode }}" {{ in_array($lan->languageCode, $selectedLanguages) ? 'selected' : '' }}>
                                                {{ $lan->languageName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                                @if ($systemFlag->valueType == 'Video')
                                    <div>
                                        <label for="image"
                                            class="form-label mt-2">{{ $systemFlag->displayName }}</label>
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][valueType]"
                                            value="{{ $systemFlag->valueType }}">
                                        <input type="hidden"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][name]"
                                            value="{{ $systemFlag->name }}">
                                        <video controls id="editMyVideo" style="width:150px;object-fit:cover"
                                            preload="metadata">
                                            <source id="blogvideo" type="video/mp4" src="/{{ $systemFlag->value }}">
                                            <track label="English" kind="subtitles" srclang="en" default />
                                        </video>
                                        <input type="file" id="blogImage"
                                            name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][value]"
                                            onchange="editVideoPreviews('{{ $systemFlag->name }}',{{ $loop->index }})"
                                            accept="video/mp4">
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        @if (count($group->subGroup) > 0)
                            @foreach ($group->subGroup as $subGroupIndex => $subGroup)

                            <h4 class="my-4 text-lg font-medium {{ strtolower(str_replace(" ","_",$subGroup->flagGroupName)) }}"> {{ ucwords($subGroup->flagGroupName) }}
                                @if ($subGroup->description)
                                    <a class="systooltip"><i class="fa fa-info-circle w-4 h-4 ml-1"
                                            style="margin-top:4px"></i>
                                        <span class="tooltiptext">{{ $subGroup->description }}</span>
                                    </a>
                                @endif
                            </h4>
                                @if($subGroup->parentFlagGroupId==2)
                                <div class="mb-2">
                                    <input type="hidden" value="{{$subGroup->id}}" name="flaggroups[{{$subGroup->id}}][id]">
                                    <label>
                                        <input class="form-check-input" type="radio" name="flaggroups[{{$subGroup->id}}][isActive]" value="1" {{ $subGroup->isActive ? 'checked' : '' }}>
                                        Enable
                                    </label>
                                    <label>
                                        <input class="form-check-input" type="radio" name="flaggroups[{{$subGroup->id}}][isActive]" value="0" {{ !$subGroup->isActive ? 'checked' : '' }}>
                                        Disable
                                    </label>
                                </div>
                                
                                @endif
                                <div class="box p-3 {{ strtolower(str_replace(" ","_",$subGroup->flagGroupName)) }}">
                                    @if($subGroup->flagGroupName == "AstrologyAPI")
                                        <select name="astroApiCallType" id="astroApiCallType">
                                            {{-- <option value="1" {{ $astroApiCallType == 1 ? 'selected' : '' }}>Manual</option>
                                            <option value="2" {{ $astroApiCallType == 2 ? 'selected' : '' }}>Astrolger API</option> --}}
                                            <option value="3" {{ $astroApiCallType == 3 ? 'selected' : '' }}>Vedic Astro API</option>
                                        </select>
                                    @endif
                                    @foreach ($subGroup->systemFlag as $systemFlagInd => $systemFlag)
                                    @if ($systemFlag->valueType == 'Text')
                                    @if ($systemFlag->name != 'AstrologyApiUserId' && $systemFlag->name != 'AstrologyApiKey')
                                        <div>
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row mt-2">
                                                {{ $systemFlag->displayName }}
                                            </label>
                                            <input type="hidden" name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][name]" value="{{ $systemFlag->name }}">
                                            <input onkeypress="return validateJavascript(event);" type="text" name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]" class="form-control" value="{{ $systemFlag->value }}">
                                        </div>
                                    @endif
                                @endif
                                
                                        @if ($systemFlag->valueType == 'Number')
                                            <div>
                                                <label for="validation-form-2"
                                                    class="form-label w-full flex flex-col sm:flex-row mt-2">
                                                    {{ $systemFlag->displayName }}
                                                </label>
                                                <input type="hidden"
                                                    name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][name]"
                                                    value="{{ $systemFlag->name }}">
                                                <input type="number"
                                                    name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                    class="form-control" required value="{{ $systemFlag->value }}">
                                            </div>
                                        @endif
                                        @if ($systemFlag->valueType == 'Radio')
                                        <div>
                                            <label for="validation-form-2"
                                                class="form-label w-full flex flex-col sm:flex-row mt-2">
                                                {{ $systemFlag->displayName }}
                                            </label>
                                            <input type="hidden"
                                                name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][name]"
                                                value="{{ $systemFlag->name }}">

                                            @if($groupIndex==3)
                                                <div class="flex flex-col sm:flex-row mt-2">
                                                    <div class="form-check mr-2">
                                                        <input class="form-check-input bucket_radio" type="radio"
                                                            name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                            value='google_bucket'
                                                            {{ $systemFlag->value == 'google_bucket' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="radio-switch-4">Google Bucket</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input class="form-check-input bucket_radio" type="radio"
                                                            name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                            value='aws_bucket'
                                                            {{ $systemFlag->value == 'aws_bucket' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="radio-switch-5">AWS Bucket</label>
                                                    </div>
                                                </div>
                                            @else

                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="form-check mr-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                        value='RazorPay'
                                                        {{ $systemFlag->value == 'RazorPay' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-switch-4">Razor
                                                        Pay</label>
                                                </div>
                                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                                    <input class="form-check-input" type="radio"
                                                        name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                        value='Stripe'
                                                        {{ $systemFlag->value == 'Stripe' ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="radio-switch-5">Stripe</label>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    @endif
                                        @if ($systemFlag->valueType == 'File')
                                            <div
                                                class="intro-y col-span-12 sm:col-span-6 2xl:col-span-4 xl:col-span-4 d-inline">
                                                <div class="box p-5  mt-2 text-center">
                                                    <label for="validation-form-2" class="form-label w-full mt-2">
                                                        {{ $systemFlag->displayName }}
                                                    </label>
                                                    <input type="hidden"
                                                        name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][valueType]"
                                                        value="{{ $systemFlag->valueType }}">
                                                    <input type="hidden"
                                                        name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][name]"
                                                        value="{{ $systemFlag->name }}">
                                                    <div class="settingimg">
                                                        <img id="{{ $systemFlag->name }}"src="/{{ $systemFlag->value }}"
                                                            width="150px" alt="gift">
                                                    </div>
                                                    <div>
                                                        <input type="file" class="mt-2"
                                                            name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                            id="image"
                                                            onchange="previews('{{ $systemFlag->name }}')"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($systemFlag->valueType == 'Video')
                                            <div>
                                                <label for="image"
                                                    class="form-label mt-2">{{ $systemFlag->displayName }}</label>
                                                <input type="hidden"
                                                    name="group[{{ $groupIndex }}][systemFlag][{{ $loop->index }}][valueType]"
                                                    value="{{ $systemFlag->valueType }}">
                                                <input type="hidden"
                                                    name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][name]"
                                                    value="{{ $systemFlag->name }}">
                                                <video controls id="editMyVideo" style="width:150px;object-fit:cover"
                                                    preload="metadata">
                                                    <source id="blogvideo" type="video/mp4"
                                                        src="/{{ $systemFlag->value }}">
                                                    <track label="English" kind="subtitles" srclang="en" default />
                                                </video>
                                                <input type="file" id="blogImage"
                                                    name="group[{{ $groupIndex }}][subGroup][{{ $subGroupIndex }}][systemFlag][{{ $systemFlagInd }}][value]"
                                                    onchange="editVideoPreviews('{{ $systemFlag->name }}',{{ $loop->index }})"
                                                    accept="video/mp4">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
                        </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"  ></script>
    <script type="text/javascript">
        $(document).ready(function() {
            jQuery('.select2').select2({
                allowClear: true,
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });

        var flagGroup = {{ Js::from($flagGroup) }};
        language = flagGroup.filter(c => c.flagGroupName == 'General');
        language = language[0].systemFlag.filter(c => c.name == 'Language')
        languageKnown = language[0].value.split(',')
        $('.language').val(languageKnown).trigger('change');


        function previews(id) {
            document.getElementById(id).src = URL.createObjectURL(event.target.files[0]);
        }

        function editVideoPreviews(id, index) {
            document.getElementById("editMyVideo").style.display = "block";
            blogvideo.src = URL.createObjectURL(event.target.files[0]);
            editMyVideo.load();
            editMyVideo.onended = function() {
                URL.revokeObjectURL(editMyVideo.currentSrc);
            };
            document.getElementById("editMyVideo").controls = true;

        }
    </script>
    <script>
        var spinner = $('.loader');
        jQuery(function() {
            jQuery('#edit-form').submit(function(e) {
                e.preventDefault();
                spinner.show();
                var data = new FormData(this);
                
                jQuery.ajax({
                    type: 'POST',
                    url: "{{ route('editSystemFlag') }}",
                    data: data,
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                     
                        if (jQuery.isEmptyObject(data.error)) {
                            spinner.hide();
                            location.reload();
                        } else {
                            spinner.hide();
                        }
                    }
                });
            });
        });

        $(window).on('load', function() {
            $('.loader').hide();
        });

        function validateJavascript(event) {
            var regex = new RegExp("^[<>]");
            var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
            if (regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }

        $(document).on('change','.bucket_radio',function(){
            changeBucketBlock($(this).val());
        });

        function changeBucketBlock(val)
        {
            if(val=='aws_bucket')
            {
                $('.aws_bucket').show();
                $('.google_bucket').hide();
            }
            else
            {
                $('.aws_bucket').hide();
                $('.google_bucket').show();
            }
        }
        $(document).ready(function(){
            changeBucketBlock($('.bucket_radio[checked]').val());
        });
        var select_bucket = $('.select_bucket');        
        $("#ThirdPartyPackage .agora")[1].after(select_bucket[0],select_bucket[1]);
    </script>
@endsection