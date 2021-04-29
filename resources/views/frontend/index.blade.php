@extends('frontend.layouts.app')
@section('title','Roar nigeria hub - Home')
@section('main-content')
    <!-- Slider Section Start -->
    <div class="rs-slider style1">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">
            @foreach ($sliders as $slider)
                <div class="slider-content slide2" style="background-image:url({{Storage::url('slider/'.$slider->image)}});">
                    <div class="container">
                        <div class="content-part text-center">
                            {{-- <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">We Increase Your</div> --}}
                            <h1 class="sl-title mb-mb-10 wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">{{ $slider->title }}</h1>
                            <div class="sl-desc fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                {{ $slider->description }}
                            </div>
                            <ul class="slider-btn wow fadeInRight" data-wow-delay="200ms" data-wow-duration="3000ms">
                                @if ($slider->link)
                                    <li><a class="readon learn-more slider-btn" href="{{ $slider->link }}">{{ $slider->btn_text }}</a></li>
                                @endif
                                @if ($slider->v_link)
                                    <li>
                                        <div class="slider-video">
                                            <a class="popup-videos" href="{{ $slider->v_link }}">
                                            <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Slider Section End -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about style1 pt-130 pb-190 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 md-mb-50">
                    <div class="rs-animation-shape">
                        <div class="pattern">
                            <img src="{{ Storage::url('about/'.$about->image1_3) }}" alt="">
                        </div>
                        <div class="middle">
                            <img class="dance" src="{{ Storage::url('about/'.$about->image2_3) }}" alt="">
                        </div>
                        <div class="bottom-shape">
                            <img class="dance2" src="{{ Storage::url('about/'.$about->image3_3) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 pl-40 md-pl-15 md-pt-200 sm-pt-0">
                    <div class="contact-wrap">
                        <div class="sec-title mb-30">
                            <div class="sub-text style2">About Us</div>
                            {!! \Illuminate\Support\Str::limit($about->content, 500) !!}
                        </div>
                        <div class="btn-part">
                            <a class="readon learn-more contact-us" href="{{ route('about-us') }}">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Offers Section Start -->
    <div class="rs-services style2 gray-color pt-120 pb-120 md-pt-80 md-pb-80">
        <div class="container">
            <div class="sec-title text-center mb-45">
                <span class="sub-text style2">Our Offers</span>
                <h2 class="title">
                    What we offer
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img src="assets/images/services/main-home/icons/1.png" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a href="{{ route('contact') }}">Office Space and Facilities</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            We understand the need for a professional work environment. We would also provide you and your team a neat working space within our Hub.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-front">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a href="{{ route('contact') }}">Office Space and Facilities</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">We understand the need for a professional work environment. We would also provide you and your team a neat working space within our Hub.</p>
                                    </div>
                                    <div class="back-btn-part">
                                        <a class="readon view-more" href="{{ route('contact') }}">Get In Touch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img src="assets/images/services/main-home/icons/2.png" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a href="{{ route('contact') }}">Mentorship and Support</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            We would provide for your team a support system and different mentors to help convert your idea into a marketable product.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-front">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a href="{{ route('contact') }}">Mentorship and Support</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">We would provide for your team a support system and different mentors to help convert your idea into a marketable product.</p>
                                    </div>
                                    <div class="back-btn-part">
                                        <a class="readon view-more" href="{{ route('contact') }}">Get In Touch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img src="assets/images/services/main-home/icons/3.png" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a href="{{ route('contact') }}">Platforms for Investment</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            We provide your bussiness with opportunities through pitch events where you showcase your ideas to potential investors.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-front">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a href="{{ route('contact') }}">Platforms for Investment</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">We provide your bussinesss with opportunities through pitch events where you showcase your ideas to potential investors.</p>
                                    </div>
                                    <div class="back-btn-part">
                                        <a class="readon view-more" href="{{ route('contact') }}">Get In Touch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-animation">
            <div class="shape-part">
                <img class="dance" src="assets/images/services/s2.png" alt="images">
            </div>
        </div>
    </div>
    <!-- Offers Section End -->

    <!-- Call Us Section Start -->
    <div class="rs-call-us rs-case-study pt-120 md-pt-70 md-pb-80 primary-background">
        <div class="container">
            <div class="row rs-vertical-middle">
                <div class="col-lg-6">
                    <div class="image-part">
                        <img src="{{ asset('frontend/assets/images/call-us/contact-here.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="rs-contact-box text-center">
                        <div class="address-item mb-25">
                            <div class="address-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="sec-title3">
                            <span class="sub-text">CALL US 24/7</span>
                            <h2 class="title">{{ $settings->phone }}</h2>
                            <p class="desc">Do you have any idea or business in your mind? Or do you want to invest or partner in a bussiness call us or schedule a appointment. Our representative will reply you shortly.</p>
                        </div>
                        <div class="btn-part mt-40">
                            <a class="readon lets-talk" href="contact.html">Let's Talk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call Us Section Start -->

    <!-- Process Section Start -->
    <div class="rs-process style3 gray-color pt-120 pb-120 md-pt-75 md-pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="process-wrap bg9" style="background-image:url({{Storage::url('background/'.$background->f3_bg)}});">
                        <div class="sec-title mb-30 ">
                            <div class="sub-text new">How We Works</div>
                            <h2 class="title title4 white-color pb-20">
                                How Roar Nigeria Hub assist your business
                            </h2>
                            <div class="desc white-color">
                                Bring to the table win-win survival strategies to ensure dotted proactive domination. At the end of the day, on going forward, anew normal that has evolved from the generation on streamlined.
                            </div>
                            <div class="btn-part mt-40">
                                <a class="readon discover started" href="contact.html">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pl-35 md-pt-40 md-pl-15">
                    <div class="row">
                        <div class="col-md-6 mb-20">
                            <div class="rs-addon-number">
                                <div class="number-text">
                                    <div class="number-area">
                                        01
                                    </div>
                                    <div class="number-title">
                                        <h3 class="title">Discovery</h3>
                                    </div>
                                    <p class="number-txt">For businesses, this could mean: creating new ideas, new products through research and development.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-20">
                            <div class="rs-addon-number">
                                <div class="number-text">
                                    <div class="number-area">
                                        02
                                    </div>
                                    <div class="number-title">
                                        <h3 class="title">Planning</h3>
                                    </div>
                                    <p class="number-txt">At this point we help explore the market and determine if your idea is a good fit oryou should pivot.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 md-mb-20">
                            <div class="rs-addon-number">
                                <div class="number-text">
                                    <div class="number-area">
                                        03
                                    </div>
                                    <div class="number-title">
                                        <h3 class="title">Execution</h3>
                                    </div>
                                    <p class="number-txt">Once the business plan is satisfactory we walk you through to the realization of the planned objective.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rs-addon-number">
                                <div class="number-text">
                                    <div class="number-area">
                                        04
                                    </div>
                                    <div class="number-title">
                                        <h3 class="title">Delivery</h3>
                                    </div>
                                    <p class="number-txt">We further support you at this point having a minimum viable product by exposing you to grants and investors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Section End -->

    <!-- Case Study Section Start -->
    @if ($startups)
        <div class="rs-case-study primary-background">
            <div class="row margin-0 align-items-center">
                <div class="col-lg-4 padding-0">
                    <div class="case-study bg12 mod" style="background-image:url({{Storage::url('background/'.$background->f4_bg)}});">
                        <div class="sec-title2 mb-30">
                            <div class="sub-text white-color">Startups</div>
                            <h2 class="title testi-title white-color pb-20">
                                Meet our Startups
                            </h2>
                            <div class="desc-big">
                                Bring to the table win-win survival strategies to dotted proactive domination. At the end of the going forward, a new normal that has evolved generation.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 padding-0">
                    <div class="case-study-wrap">
                        <!-- Project Section Start -->
                        <div class="rs-project style3 modify1 mod md-pt-0">
                            <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="true" data-md-device-dots="false">
                                @foreach ($startups as $startup)
                                    <div class="project-item">
                                        <div class="project-img">
                                            <a href="{{ route('startup', $startup->id) }}"><img src="{{ Storage::url('startups/front/'.$startup->image) }}" alt="images"></a>
                                        </div>
                                        <div class="project-content">
                                            <div class="portfolio-inner">
                                                <h3 class="title"><a href="{{ route('startup', $startup->id) }}">{{ $startup->name }}</a></h3>
                                                <span class="category"><a href="{{ route('startup', $startup->id) }}">{{ $startup->idea }}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Project Section End -->
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Case Study Section Start -->

    <!-- Events Section Start -->
    @if ($events)
        <div id="rs-blog" class="rs-blog gray-color pt-120 pb-120 md-pt-75 md-pb-80">
            <div class="container pt-relative">
                <div class="sec-left">
                    <h2 class="title wow fadeInDown">Latest Events</h2>
                </div>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                    @foreach ($events as $event)
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="{{route('event',$event->id)}}"><img src="{{ Storage::url('events/front/'.$event->image) }}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li class="date"><i class="fa fa-calendar-check-o"></i> {{$event->created_at->format('d M, Y. D')}}</li>
                                </ul>
                                <h3 class="blog-title"><a href="{{route('event',$event->id)}}">{{ $event->title }}</a></h3>
                                <div class="blog-button"><a href="{{route('event',$event->id)}}">Learn More</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Events Section End -->

    <!-- Blog Section Start -->
    @if ($posts)
        <div id="rs-blog" class="rs-blog pb-120 pt-120 md-pt-80 md-pb-80">
            <div class="container">
                <div class="sec-title2 text-center mb-45">
                    <span class="sub-text style2">Blogs</span>
                        <h2 class="title testi-title">
                            Read Our Latest Tips & Tricks
                        </h2>
                    <div class="heading-line">

                    </div>
                </div>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                    @foreach ($posts as $post)
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="{{route('blog.show',$post->slug)}}"><img src="{{Storage::url('posts/front/'.$post->image)}}" alt=""></a>
                                <ul class="post-categories">
                                    @foreach ($post->categories as $category)
                                        <li><a href="{{ route('blog.categories',$category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li class="date"><i class="fa fa-calendar-check-o"></i> {{$post->created_at->format('d M, Y. D')}}</li>
                                    <li class="admin"><i class="fa fa-user-o"></i> {{$post->user->name}}</li>
                                    <li class="admin"><i class="fa fa-comments-o"></i> {{$post->comments_count}}</li>
                                </ul>
                                <h3 class="blog-title"><a href="{{route('blog.show',$post->slug)}}">{{ $post->title }}</a></h3>
                                <p class="desc">{!! \Illuminate\Support\Str::limit($post->body,120) !!}</p>
                                <div class="blog-button"><a href="{{route('blog.show',$post->slug)}}">Learn More</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Blog Section End -->

    <!-- Partner Start -->
    <div class="rs-partner pt-80 pb-70">
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($partners as $partner)
                    <div class="partner-item">
                        <div class="logo-img">
                            <a href="{{ $partner->link }}">
                                <img class="hover-logo" src="{{ Storage::url('partners/'.$partner->logo) }}" alt="">
                                <img class="main-logo" src="{{ Storage::url('partners/'.$partner->logo) }}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Partner End -->
@endsection
