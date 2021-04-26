@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - About Us')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img1" style="background-image:url({{Storage::url('background/'.$background->a1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">About</h1>
            <ul>
                <li title="{{ $settings->name }} - Where innovation lives">
                    <a class="active" href="index.html">Home</a>
                </li>
                <li>About</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- About Section Start -->
    <div class="rs-about gray-color pt-120 pb-120 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-30">
                    <div class="rs-animation-shape">
                        <div class="images">
                           <img src="{{ Storage::url('about/'.$about->image) }}" alt="">
                        </div>
                        <div class="middle-image2">
                           <img class="dance3" src="{{ asset('frontend/assets/images/about/effect-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pl-60 md-pl-15">
                    <div class="contact-wrap">
                        <div class="sec-title mb-30">
                            <div class="sub-text style-bg">About Us</div>
                            {!! $about->content !!}
                        </div>
                        <div class="btn-part">
                            {{-- <a class="readon learn-more" href="contact.html">Learn-More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-image">
                <img class="top dance" src="{{ asset('frontend/assets/images/about/dotted-3.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Team Section Start -->
    <div class="rs-team pt-120 pb-120 md-pt-80 md-pb-80 xs-pb-54" style="background-image:url({{Storage::url('background/'.$background->a2_bg)}});">
        <div class="sec-title2 text-center mb-30">
            <span class="sub-text style-bg white-color">Team</span>
            <h2 class="title white-color">
                The Management Team
            </h2>
        </div>
        <div class="container">
            <div class="container">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
                    @foreach ($team as $person)
                        <div class="team-item-wrap">
                            <div class="team-wrap">
                                <div class="image-inner">
                                    <a href="{{ route('member', $person->id) }}"><img src="{{ Storage::url('team/'.$person->image) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4 class="person-name"><a href="{{ route('member', $person->id) }}">{{ $person->name }}</a></h4>
                                <span class="designation">{{ $person->name }}</span>
                                <ul class="team-social">
                                    @if ($person->facebook)
                                        <li><a href="{{ $person->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if ($person->instagram)
                                        <li><a href="{{ $person->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if ($person->twitter)
                                    <li><a href="{{ $person->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($person->linkedin)
                                        <li><a href="{{ $person->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Process Section Start -->
    <div class="rs-cta style1 bg-widget pt-80 pb-80">
        <div class="container">
            <div class="cta-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-9 pr-148 sm-pr-0 md-pl-15 col-md-12 md-mb-30">
                        <div class="title-wrap">
                            <h2 class="epx-title">Grow Your Startup and Build Your business With us.</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right md-text-left col-md-12">
                        <div class="button-wrap">
                            <a class="readon learn-more" href="{{ route('contact') }}">Get In Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Section End -->
@endsection
