@extends('frontend.astrologers.layout.master')
@section('content')
    <div class="pt-1 pb-1 bg-red d-md-block astroway-breadcrumb">
        <div class="container">
            <div class="row afterLoginDisplay">
                <div class="col-md-12 d-flex align-items-center">
                    <span style="text-transform: capitalize; ">
                        <span class="text-white breadcrumbs">
                            <a href="{{route('front.astrologerindex')}}" style="color:white;text-decoration:none">
                                <i class="fa fa-home font-18"></i>
                            </a>
                            <i class="fa fa-chevron-right"></i> About Us
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="ds-head-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h2 class="h2 font-weight-bold color-off-black mb-4 cat-heading">{{$aboutus->title}}</h2>
                    {!!$aboutus->description!!}

            </div>
        </div>
    </div>
@endsection
