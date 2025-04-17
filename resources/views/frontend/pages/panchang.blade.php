@extends('frontend.layout.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <style>
        .bg-white {
            --bs-bg-opacity: 1;
            /* background-color: rgb(35 23 58) !important; */
            background-color: #12002c !important;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        h2.cat-heading {
            /* padding-left: 288px; */
            font-weight: 700;
            font-size: 25px;
            text-align: center;
            text-transform: uppercase;
            color: white;
        }

        .color-red {
            color: #65A9FD !important;
        }

        .text-center {
            text-align: center !important;
            gap: 5px;
        }

        .rounded-lg {
            border-radius: .3rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .mb-1,
        .my-1 {
            margin-bottom: .25rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .collapse:not(.show) {
            display: none;
        }

        .shadow-pink {
            box-shadow: 0px 0px 6px #EE4E5E47;
        }


        .text-center {
            text-align: center !important;

            /* padding-left: 167px;
                padding-right: 184px; */
        }
        .site-title h1 {
            margin-bottom: -5px !important;
        }

        .high {
            background-color: #EE4E5E !important;
            color: #fff;
        }

        .monthbox {
            background: #5E2329CF !important;
            width: 39px !important;
            padding: 3px;
            margin: 3px;
            display: inline-block;
            color: #fff;
            font-size: 12px;
            text-align: center;
            border-radius: 19px;
        }

        .daybox {
            background: #F9C5CA;
            display: flex;
            width: 31px;
            height: 30px;
            color: black;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 15px;
            border-radius: 19px;
        }

        .contact-section {
            text-align: center;
            padding: 50px 20px;

        }

        .panchange-view {
            /* background-color: rgb(39, 39, 75); */
            margin-top: -24px;
        }

        .panchange-table {
            padding-left: 81px;
            padding-right: 80px;
        }


    .daybox:hover {
        background-color: #fff;
    }


    .scroll-wrapper {
        overflow-x: auto;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 10px;
    }

    .scroll-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .scroll-wrapper::-webkit-scrollbar-thumb {
        background: #ffbd59;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .monthbox {
            font-size: 1rem;
        }

        .daybox {
            font-size: 0.9rem;
            padding: 8px 10px;
        }
    }

    @media (max-width: 480px) {
        .daybox {
            margin: 0 3px;
            padding: 6px 8px;
        }
    }
    </style>

    <div class="ds-head-populararticle bg-white cat-pages panchange-view">

        <br><br><br>
        <div class="row py-3 mt-4">
            <div class="col-12">
                <h2 class="cat-heading font-24">Today’s Panchang <span class="color-red">(Aaj Ka Panchang)</span></h2>
                <p class="pt-3 text-center">Panchang is the Hindu calendar
                    followed by Vedic astrology, which provides
                    complete detail on each day's Tithis and auspicious and inauspicious timings. Today’s Panchang on
                    Astroway is based on Vijay Vishwa Panchang, which is the rarest of Panchang, used by
                    Astrologers for hundreds of years. Through Daily Panchang, you can get all the information about the
                    time, date, and day to determine the Muhurat for everything. Astrologers suggest people should
                    follow the Day Panchang while doing new work or performing any auspicious event.</p>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center mt-3 mb-0">
                        <div id="cardholder" class="rounded-lg">
                            <div style="position: initial !important; width: 100% !important;">
                                <div class="pt-0 mb-1">

                                    <a id="toggleCalendar"
                                        class="card-link btn btn-success m-1 bg-white text-dark border-red font-14 font-weight-semi-bold titlecase rounded-25 mt-2"
                                        href="javascript:void(0)" style="color: white !important;">
                                        Calendar&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                        <i class="fa fa-caret-up" aria-hidden="true" style="display:none"></i>
                                    </a>

                                    @php
                                        $todayActive = !request()->has('panchangDate');
                                        $tomorrowActive =
                                            request('panchangDate') === date('Y-m-d', strtotime('+1 day'));
                                    @endphp
                                    <a class="btn btn-success m-1 {{ $todayActive ? 'bg-red text-white' : 'bg-white text-dark' }} border-red font-14 font-weight-semi-bold titlecase rounded-25 mt-2"
                                        href="{{ route('front.getPanchang') }}" style="color: white !important;">TODAY&nbsp;
                                    </a>
                                    <a class="btn btn-success m-1 {{ $tomorrowActive ? 'bg-red text-white' : 'bg-white text-dark' }} border-red font-14 font-weight-semi-bold titlecase rounded-25 mt-2"
                                        href="{{ route('front.getPanchang', ['panchangDate' => date('Y-m-d', strtotime('+1 day'))]) }}"
                                        style="color: white !important;">TOMORROW&nbsp;
                                    </a>
                                </div>


                                <div id="calendarSection" class="collapse">
                                    <div class="col-12 pt-2">
                                        <div class="px-3 pb-1 rounded shadow-pink">
                                            <div class="row flex-nowrap overflow-auto">
                                                <div class="col-auto text-center pt-2 pb-3">
                                                    <a href="{{ route('front.getPanchang') }}"
                                                        class="monthbox high">{{ date('M') }}</a>
                                                </div>
                                                <div class="col-auto text-center d-flex" style="margin-top: 10px;">
                                                    @for ($day = 1; $day <= 30; $day++)
                                                        @php
                                                            $date = sprintf('%02d', $day);
                                                            $year = date('Y');
                                                            $month = date('m');
                                                            $fullDate = "$year-$month-$date";
                                                        @endphp
                                                        <a href="{{ route('front.getPanchang', ['panchangDate' => $fullDate]) }}"
                                                            class="daybox {{ request('panchangDate', date('Y-m-d')) == $fullDate ? ' high' : '' }}">{{ $day }}</a>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-2 pt-1 panchange-table">
                    <div class="col-12 Choghadiya_section my-3">
                        <div class="shadow-pink rounded-10 p-3">
                            <div class="row">
                                <div class="col-md-6 col-12 CGH_Ssection0">
                                    <div class="shadow-pink rounded h-100">
                                        <div class="bg-pink p-1 rounded-top text-center">
                                            <p class="font-14 color-red font-weight-bold m-0">Panchang</p>
                                        </div>
                                        <div class="Choghadiya_img_day px-3 pt-3 font-14">

                                            <div class="row border-bottom">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Tithi</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['tithi']['name'] }}</p>
                                                </div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Nakshatra</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['nakshatra']['name'] }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Yoga</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['yoga']['name'] }}</p>
                                                </div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Karana</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['karana']['name'] }}</p>
                                                </div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Rasi</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['rasi']['name'] }}</p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="shadow-pink rounded h-100">
                                        <div class="bg-pink p-1 rounded-top text-center">
                                            <p class="font-14 color-red font-weight-bold m-0">Additional Info</p>
                                        </div>
                                        <div class="Choghadiya_img_day px-3 pt-3 font-14">
                                            <div class="row border-bottom">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Sunrise</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['sun_rise'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Sunset</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['sun_set'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Moonrise</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['moon_rise'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Moonset</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['moon_set'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Next Full Moon</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['next_full_moon'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Next New Moon</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['next_new_moon'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Amanta Month</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['masa']['amanta_name'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Paksha</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['masa']['paksha'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row border-bottom pt-2">
                                                <div class="col-6">
                                                    <p class="font-weight-semi-bold mb-2">Purnimanta</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-2">
                                                        {{ $getPanchang['recordList']['response']['advanced_details']['masa']['purnimanta_name'] }}
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById("toggleCalendar").addEventListener("click", function() {
            var calendar = document.getElementById("calendarSection");
            var caretDown = this.querySelector(".fa-caret-down");
            var caretUp = this.querySelector(".fa-caret-up");

            if (calendar.classList.contains("show")) {
                calendar.classList.remove("show"); // Hide
                caretDown.style.display = "inline";
                caretUp.style.display = "none";
            } else {
                calendar.classList.add("show"); // Show
                caretDown.style.display = "none";
                caretUp.style.display = "inline";
            }
        });
    </script>
@endsection
