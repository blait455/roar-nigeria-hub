@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Event')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img4" style="background-image:url({{Storage::url('background/'.$background->a1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">{{ $member->name }}</h1>
            <ul>
                <li title="{{ $settings->name }} - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li title="Go to the management team archives"><a class="active" href="{{ route('about-us') }}">Management Team</a></li>
                <li>{{ $member->name }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Team Start -->
    <div class="rs-team-Single pt-120 pb-100 md-pt-80 md-pb-60">
        <div class="container">
            <div class="btm-info-team">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="images-part">
                            <img src="{{ Storage::url('team/'.$member->image) }}" alt="images">
                        </div>
                    </div>
                    <div class="col-lg-7 sm-pt-30">
                        <div class="con-info">
                            <span class="designation-info">{{ $member->position }}</span>
                            <h2 class="title">{{ $member->name }}</h2>
                            <div class="short-desc">
                                {{ $member->description }}
                            </div>
                            <div class="ps-informations">
                                <ul class="personal-info">
                                    @if ($member->email)
                                        <li>
                                            <span><i class="flaticon-email"> </i> </span>
                                            <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                        </li>
                                    @endif
                                    @if ($member->phone)
                                        <li>
                                            <span><i class="flaticon-call"></i></span>
                                            <a href="tel:{{ $member->phone }}">{{ $member->phone }}</a>
                                        </li>
                                    @endif
                                </ul>
                                <ul class="social-info">
                                    <li><a href="{{ $member->facebbok }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $member->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $member->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{ $member->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pr-55 md-pr-15">
                    <div class="project-con">
                        @if ($member->bio)
                            <h3>Biography</h3>
                            {!! $member->bio !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Cta section start -->
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
    <!-- Cta section end -->
@endsection
