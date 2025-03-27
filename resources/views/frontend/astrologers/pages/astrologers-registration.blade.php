@extends('frontend.layout.app')
@section('title', 'Sanatan | Astrologer Multi-Step Form ')
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(39, 39, 75); 
        }
        .form-container {
            width: -webkit-fill-available;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: auto;
        }
        .progress {
            height: 10px;
            border-radius: 5px;
        }
        .btn-step {
            background-color: #ff6600;
            color: #fff;
            border-radius: 6px;
            font-size: 16px;
            padding: 10px 20px;
            transition: 0.3s;
        }
        .btn-step:hover {
            background-color: #e65c00;
        }
    </style>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4"><small class="font-weight-bold">Astrologer Sign Up - Personal
        Details</small></h2>

        <!-- Progress Bar -->
        <div class="progress mb-4">
            <div class="progress-bar" id="progressBar" style="width: 20%;" role="progressbar"></div>
        </div>

        <!-- Multi-Step Form -->
       
        <form id="astrologerForms" action="{{route('front.astrologerstore')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <!-- Step 1: Personal Details -->
            <div class="step" id="step1">
                <h4>Step 1: Personal Details</h4>
                <div class="col-md-12 mb-6">
                                <label for="name">Name<span class="color-red font-weight-bold">*</span></label>
                                <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control rounded"  >

                            </div>
                            <div class="col-12 mb-6">
                                <label for="email">Email Address<span class="color-red font-weight-bold">*</span></label>
                                <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-6">
                                <label for="email">Password<span class="color-red font-weight-bold">*</span></label>
                                <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control rounded"  >
                            </div>

                            <div class="col-12 mb-3">
                                <label for="contactNo">Phone No<span class="color-red font-weight-bold">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="countryCode" value="{{ old('countryCode') }}" placeholder="+91" name="countryCode"
                                        class="form-control rounded-left" style="max-width: 60px;"  >
                                    <input type="text" value="{{ old('contactNo') }}" id="contactNo" name="contactNo" class="form-control rounded-right"
                                         >
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="profileImage">Profile<span class="color-red font-weight-bold">*</span></label>
                                <input type="file" class="form-control" value="{{ old('profileImage') }}" id="profileImage" name="profileImage" style="height: 44px">
                            </div>
                <button type="button" class="btn btn-step float-end" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 2: Expertise -->
            <div class="step d-none" id="step2">
                <h4>Step 2: Expertise</h4>
                <div class="col-12 mb-3">
                                <label for="gender">Gender<span class="color-red font-weight-bold">*</span></label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="birthDate">Birth Date<span class="color-red font-weight-bold">*</span></label>
                                <input type="date" value="{{ old('birthDate') }}" name="birthDate" id="birthDate"
                                    class="form-control rounded border-pink ">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="astrologerCategoryId">Category<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control select2" name="astrologerCategoryId[]" id="astrologerCategoryId"
                                    multiple>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ (collect(old('astrologerCategoryId'))->contains($category->id)) ? 'selected' : '' }}>{{$category->name}}</option>
                                   @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="primarySkill">Primary Skills<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control select2" name="primarySkill[]" id="primarySkill" multiple>
                                    @foreach($skills as $skill)
                                    <option value="{{$skill->id}}" {{ (collect(old('primarySkill'))->contains($skill->id)) ? 'selected' : '' }}>{{$skill->name}}</option>
                                    @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="allSkill">All Skills<span class="color-red font-weight-bold">*</span></label>
                                <select class="form-control select2" name="allSkill[]" id="allSkill" multiple>
                                    @foreach($skills as $skill)
                                    <option value="{{$skill->id}}" {{ (collect(old('allSkill'))->contains($skill->id)) ? 'selected' : '' }}>{{$skill->name}}</option>
                                    @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="languageKnown">Language<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control select2" name="languageKnown[]" id="languageKnown" multiple>
                                    @foreach($languages as $language)
                                    <option value="{{$language->id}}" {{ (collect(old('languageKnown'))->contains($language->id)) ? 'selected' : '' }}>{{$language->languageName}}</option>
                                   @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="charge">Add your charge(as per min)<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="number" value="{{ old('charge') }}" id="charge" name="charge" class="form-control rounded"
                                     >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="videoCallRate">Add your video charge(as per min)<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="number" value="{{ old('videoCallRate') }}" id="videoCallRate" name="videoCallRate"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="reportRate">Add your report charge<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="number" value="{{ old('reportRate') }}" id="reportRate" name="reportRate" class="form-control rounded"
                                     >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="experienceInYears">Experience in years<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="number" value="{{ old('experienceInYears') }}" id="experienceInYears" name="experienceInYears"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="dailyContribution">How many hours you can contribute daily?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="number" value="{{ old('dailyContribution') }}" id="dailyContribution" name="dailyContribution"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="hearAboutAstroguru">Where did you hear about ?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('hearAboutAstroguru') }}" id="hearAboutAstroguru" name="hearAboutAstroguru"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label>Are you working on any other platform?<span
                                        class="color-red font-weight-bold">*</span></label><br>
                                <input type="radio" id="astro-yes" name="isWorkingOnAnotherPlatform" value="1"
                                     > Yes
                                <input type="radio" id="astro-no" name="isWorkingOnAnotherPlatform" value="0"
                                     > No
                            </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                <button type="button" class="btn btn-step float-end" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 3: Skills & Languages -->
            <div class="step d-none" id="step3">
                <h4>Step 3: Skills & Languages</h4>
                <div class="col-12 mb-3">
                                <label for="whyOnBoard">Why do you think we should onboard you?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" id="awhyOnBoard" name="whyOnBoard" class="form-control rounded"
                                     >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="interviewSuitableTime">What is suitable time for interview?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('interviewSuitableTime') }}" id="interviewSuitableTime" name="interviewSuitableTime" class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="currentCity">Which city do you currently live in?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('currentCity') }}" id="currentCity" name="currentCity" class="form-control rounded"
                                     >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="mainSourceOfBusiness">Main Source of business(Other than astrology)?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control" name="mainSourceOfBusiness" id="mainSourceOfBusiness">
                                    @foreach ($mainSourceBusiness as $source)
                                    <option value='{{ $source->jobName }}' {{ (collect(old('mainSourceOfBusiness'))->contains($source->jobName)) ? 'selected' : '' }}>
                                        {{ $source->jobName }}</option>
                                    @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="highestQualification">Select your qualification<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control" name="highestQualification" id="highestQualification">
                                    @foreach ($highestQualification as $highest)
                                    <option value='{{ $highest->qualificationName }}' {{ (collect(old('highestQualification'))->contains($highest->qualificationName)) ? 'selected' : '' }}>
                                        {{ $highest->qualificationName }}</option>
                                @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="degree">Degree / Diploma<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control" name="degree" id="degree">
                                    @foreach ($qualifications as $qua)
                                    <option value='{{ $qua->degreeName }}' {{ (collect(old('degree'))->contains($qua->degreeName)) ? 'selected' : '' }}>
                                        {{ $qua->degreeName }}</option>
                                @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="college">College/School/University name<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('college') }}" id="college" name="college" class="form-control rounded"
                                     >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="learnAstrology">From where did you learn Astrology?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('learnAstrology') }}" id="learnAstrology" name="learnAstrology"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="instaProfileLink">Instagram profile link<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('instaProfileLink') }}" id="instaProfileLink" name="instaProfileLink"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="facebookProfileLink">Facebook profile link<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('facebookProfileLink') }}" id="facebookProfileLink" name="facebookProfileLink"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="linkedInProfileLink">LinkedIn profile link<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('linkedInProfileLink') }}" id="linkedInProfileLink" name="linkedInProfileLink"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="youtubeChannelLink">Youtube profile link<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('youtubeChannelLink') }}" id="youtubeChannelLink" name="youtubeChannelLink"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="websiteProfileLink">Website profile link<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('websiteProfileLink') }}" id="websiteProfileLink" name="websiteProfileLink"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label>Did anybody referred you?<span
                                        class="color-red font-weight-bold">*</span></label><br>
                                <input type="radio" id="astro-yes" name="isAnyBodyRefer" value="1"  > Yes
                                <input type="radio" id="astro-no" name="isAnyBodyRefer" value="0"  > No
                            </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                <button type="button" class="btn btn-step float-end" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 4: Social Media Links -->
            <div class="step d-none" id="step4">
                <h4>Step 4: Social Media Links</h4>
                <div class="col-12 mb-3">
                                <label for="minimumEarning">Minimum Earning Expection<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('minimumEarning') }}" id="minimumEarning" name="minimumEarning"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="maximumEarning">Maximum Earning Expection<span
                                        class="color-red font-weight-bold">*</span></label>
                                <input type="text" value="{{ old('maximumEarning') }}" id="maximumEarning" name="maximumEarning"
                                    class="form-control rounded"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="NoofforeignCountriesTravel">Number of the foreign countries you lived/travel
                                    to?<span class="color-red font-weight-bold">*</span></label>
                                <select class="form-control" name="NoofforeignCountriesTravel"
                                    id="NoofforeignCountriesTravel">
                                    @foreach ($countryTravel as $travel)
                                    <option value='{{ $travel->NoOfCountriesTravell }}' {{ (collect(old('NoofforeignCountriesTravel'))->contains($travel->NoOfCountriesTravell)) ? 'selected' : '' }}>
                                        {{ $travel->NoOfCountriesTravell }}</option>
                                @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="currentlyworkingfulltimejob">Are you currently working a fulltime job?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <select class="form-control" name="currentlyworkingfulltimejob"
                                    id="currentlyworkingfulltimejob">
                                    @foreach ($jobs as $working)
                                            <option value='{{ $working->workName }}' {{ (collect(old('currentlyworkingfulltimejob'))->contains($working->workName)) ? 'selected' : '' }}>
                                                {{ $working->workName }}</option>
                                        @endforeach
                                    <!-- Add more categories as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="loginBio">Long Bio<span class="color-red font-weight-bold">*</span></label>
                                <textarea id="loginBio"  name="loginBio" class="form-control rounded">{{ old('loginBio') }}</textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="goodQuality">What are some good qualities of perfect astrologer?<span
                                        class="color-red font-weight-bold">*</span></label>
                                <textarea id="goodQuality"  name="goodQuality" class="form-control rounded">{{ old('goodQuality') }}</textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="biggestChallenge">What was the biggest challenge you faced and how did you
                                    overcome it?<span class="color-red font-weight-bold">*</span></label>
                                <textarea id="biggestChallenge"  name="biggestChallenge" class="form-control rounded">{{ old('biggestChallenge') }}</textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="whatwillDo">A customer is asking the same question repeatedly: what will you
                                    do?<span class="color-red font-weight-bold">*</span></label>
                                <textarea id="whatwillDo"  name="whatwillDo" class="form-control rounded">{{ old('whatwillDo') }}</textarea>
                            </div>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                <button type="button" class="btn btn-step float-end" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 5: Final Submission -->
            <div class="step d-none" id="step5">
                <h4>Step 5: Final Submission</h4>
                <div class="col-12 mb-3">
                                <label>Availability<span class="color-red font-weight-bold">*</span></label>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label>Sunday</label>
                                        <input type="hidden" name="astrologerAvailability[0][day]" value="Sunday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="sunday-from">From Time</label>
                                                <input type="time" id="sunday-from" name="astrologerAvailability[0][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="sunday-to">To Time</label>
                                                <input type="time" id="sunday-to" name="astrologerAvailability[0][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Monday</label>
                                        <input type="hidden" name="astrologerAvailability[1][day]" value="Monday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="monday-from">From Time</label>
                                                <input type="time" id="monday-from" name="astrologerAvailability[1][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="monday-to">To Time</label>
                                                <input type="time" id="monday-to" name="astrologerAvailability[1][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Tuesday</label>
                                        <input type="hidden" name="astrologerAvailability[2][day]" value="Tuesday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="tuesday-from">From Time</label>
                                                <input type="time" id="tuesday-from" name="astrologerAvailability[2][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="tuesday-to">To Time</label>
                                                <input type="time" id="tuesday-to" name="astrologerAvailability[2][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Wednesday</label>
                                        <input type="hidden" name="astrologerAvailability[3][day]" value="Wednesday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="wednesday-from">From Time</label>
                                                <input type="time" id="wednesday-from" name="astrologerAvailability[3][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="wednesday-to">To Time</label>
                                                <input type="time" id="wednesday-to" name="astrologerAvailability[3][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Thursday</label>
                                        <input type="hidden" name="astrologerAvailability[4][day]" value="Thursday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="thursday-from">From Time</label>
                                                <input type="time" id="thursday-from" name="astrologerAvailability[4][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="thursday-to">To Time</label>
                                                <input type="time" id="thursday-to" name="astrologerAvailability[4][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Friday</label>
                                        <input type="hidden" name="astrologerAvailability[5][day]" value="Friday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="friday-from">From Time</label>
                                                <input type="time" id="friday-from" name="astrologerAvailability[5][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="friday-to">To Time</label>
                                                <input type="time" id="friday-to" name="astrologerAvailability[5][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Saturday</label>
                                        <input type="hidden" name="astrologerAvailability[6][day]" value="Saturday">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="saturday-from">From Time</label>
                                                <input type="time" id="saturday-from" name="astrologerAvailability[6][time][0][fromTime]"
                                                    class="form-control rounded" placeholder="From Time">
                                            </div>
                                            <div class="col-6">
                                                <label for="saturday-to">To Time</label>
                                                <input type="time" id="saturday-to" name="astrologerAvailability[6][time][0][toTime]"
                                                    class="form-control rounded" placeholder="To Time">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="text-dark">
                                    <small>
                                        <input type="checkbox" id="tandc" class="align-baseline">
                                        I Agree To <a class="text-dark" style="color:#EE4E5E !important"
                                            href="#" target="_blank">Terms Of Use</a>&nbsp;and&nbsp;<a
                                            class="text-dark" style="color:#EE4E5E !important" href="#"
                                            target="_blank">Privacy Policy</a>
                                    </small>
                                </label>
                            </div>
                <p>Please review your details before submitting.</p>
                <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                <button type="submit" class="btn btn-success float-end">Submit</button>
            </div>

        </form>
    </div>
</div>


<script>
    let currentStep = 1;
    const totalSteps = 5;

    function showStep(step) {
        // Hide all steps
        document.querySelectorAll('.step').forEach(s => s.classList.add('d-none'));
        // Show current step
        document.getElementById(`step${step}`).classList.remove('d-none');
        // Update progress bar
        document.getElementById('progressBar').style.width = `${(step / totalSteps) * 100}%`;
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // document.getElementById('astrologerForm').addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     alert('Form Submitted Successfully!');
    // });

    document.getElementById('astrologerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    let formData = new FormData(this);
    
    console.log([...formData]); // Debug: Check form data in console

    fetch("{{route('front.astrologerstore') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Form Submitted Successfully!");
            window.location.href = "/astrologer_registration"; // Redirect on success
        } else {
            // Display errors if available
            let errorMessages = "";
            if (data.errors) {
                for (const [field, messages] of Object.entries(data.errors)) {
                    errorMessages += `${field}: ${messages.join(", ")}\n`;
                }
            } else {
                errorMessages = data.message || "Something went wrong!";
            }
            alert("Error:\n" + errorMessages);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An unexpected error occurred. Please try again.");
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
