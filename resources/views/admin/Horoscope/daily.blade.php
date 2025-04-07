{{-- resources/views/Horoscope/daily.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Horoscope/weekly.css') }}">

    <div class="container">
        <main class="main-content">
            <div class="header">
                <div class="date-selector">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" value="2025-03-05">
                </div>
            </div>
            @if ($totalRecords > 0)
                <section class="horoscope-list">
                    <table class="horoscope-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Zodiac</th>
                                <th>Lucky Color</th>
                                <th>Lucky Color Code</th>
                                <th>Lucky Number</th>
                                <th>Total Score</th>
                                <th>Physique</th>
                                <th>Status</th>
                                <th>Finances</th>
                                <th>Relationship</th>
                                <th>Career</th>
                                <th>Travel</th>
                                <th>Family</th>
                                <th>Friends</th>
                                <th>Health</th>
                                <th>Response</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($dailyHoroscope as $horoscope)
                                <tr class="intro-x">
                                    <td>{{ ($page - 1) * 15 + ++$no }}</td>

                                    <td>
                                        {{ $horoscope->zodiac }}
                                    </td>
                                    <td>
                                        {{ $horoscope->lucky_color }}
                                    </td>
                                    <td>
                                        <h6
                                            style="background-color:{{ $horoscope->lucky_color_code }};color:{{ $horoscope->lucky_color_code }}
                            ">
                                            {{ $horoscope->lucky_color_code }}
                                        </h6>
                                    </td>
                                    <td class="text-center">{{ $horoscope->lucky_number }}</td>
                                    <td class="text-center">
                                        {{ $horoscope->total_score }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->physique }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->status }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->finances }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->relationship }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->career }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->travel }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->family }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->friends }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->health }}
                                    </td>
                                    <td class="text-center">
                                        {{ implode(' ', array_slice(explode(' ', $horoscope->bot_response), 0, 5)) }}
                                    </td>
                                    <td class="text-center">
                                        {{ $horoscope->date }}
                                    </td>

                                </tr>
                            @endforeach
                            <!-- <tr>
                                    <td>5</td>
                                    <td>Cancer</td>
                                    <td>hot pink</td>
                                    <td>#ff69b4</td>
                                    <td>[9,0]</td>
                                    <td>62</td>
                                    <td>18</td>
                                    <td>68</td>
                                    <td>53</td>
                                    <td>28</td>
                                    <td>58</td>
                                    <td>88</td>
                                    <td>33</td>
                                    <td>38</td>
                                    <td>43</td>
                                    <td>వ్యక్తిగత మరియు వృత్తిపరమైన సమస్యల కారణంగా</td>
                                    <td>2025-03-04</td>
                                </tr> -->
                        </tbody>
                    </table>
                </section>
                <div class="d-inline text-slate-500 pagecount">Showing {{ $start }} to {{ $end }} of
                    {{ $totalRecords }} entries</div>
                <div class="d-inline addbtn intro-y col-span-12">
                    <nav class="w-full sm:w-auto sm:mr-auto">
                        <ul class="pagination" id="pagination">
                            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ route('admin.horoscope.daily', ['page' => $page - 1, 'searchString' => $searchString]) }}">
                                    <i class="w-4 h-4" data-lucide="chevron-left"></i>
                                </a>
                            </li>
                            @for ($i = 0; $i < $totalPages; $i++)
                                <li class="page-item {{ $page == $i + 1 ? 'active' : '' }} ">
                                    <a class="page-link"
                                        href="{{ route('admin.horoscope.daily', ['page' => $i + 1, 'searchString' => $searchString]) }}">{{ $i + 1 }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $page == $totalPages ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ route('admin.horoscope.daily', ['page' => $page + 1, 'searchString' => $searchString]) }}">
                                    <i class="w-4 h-4" data-lucide="chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination -->
                <div class="pagination-container">
                    <button disabled>« Previous</button>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">...</a>
                    <button>Next »</button>
                </div>
            @else
                <div class="intro-y mt-5" style="height:100%">
                    <div style="display:flex;align-items:center;height:100%;">
                        <div style="margin:auto">
                            <!-- <img src="/build/assets/images/nodata.png" style="height:290px" alt="noData"> -->
                            <h3 class="text-center">No Data Available</h3>
                        </div>
                    </div>
                </div>
            @endif
        </main>
    </div>



@endsection
