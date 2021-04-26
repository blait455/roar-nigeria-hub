@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Event')

@section('main-content')
                <!-- Breadcrumbs Start -->
                <div class="rs-breadcrumbs img2" style="background-image:url({{Storage::url('background/'.$background->e2_bg)}});">
                    <div class="breadcrumbs-inner text-center">
                        <h1 class="page-title">{{ $event->title }}</h1>
                        <ul>
                            <li title="Roar Nigeria Hub - Where innovation lives">
                                <a class="active" href="{{ route('home') }}">Home</a>
                            </li>
                            <li title="Go To Startups">
                                <a class="active" href="{{ route('events') }}">Events</a>
                            </li>
                            <li>{{ $event->title }}</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumbs End -->


                <!-- Services Single Start -->
                <div class="rs-case-studies-single pt-120 pb-120 md-pt-80 md-pb-80">
                   <div class="container">
                        <div class="row">
                            <div class="col-lg-12 md-mb-50">
                                <div class="services-img">
                                    <img src="{{ Storage::url('events/'.$event->image) }}" alt="">
                                </div>

                                <h2 class="mt-34">{{ $event->title }}</h2>

                                <p><b>Date:</b> {{$event->created_at->format('d M, Y. D')}}</p>

                                <p>{!! $event->description !!}</p>

                                <div class="services-img">
                                    <img src="assets/images/project/single/2.jpg" alt="">
                                </div>

                            </div>
                            {{-- <div class="col-lg-4 pl-32 md-pl-15">
                                <div class="ps-informations">
                                    <h3 class="info-title">Startup Info</h3>
                                    <ul>
                                        <li><span>Category:</span>{{ $startup->aspect->title }}</li>
                                        <li><span>Phone:  </span>{{ $startup->phone }}</li>
                                        <li><span>Email: </span>{{ $startup->email }}</li>
                                        <li><span>Website:  </span>{{ $startup->website }}</li>
                                        <li><span>Status:  </span>
                                            @if ($startup->status == 1)
                                                Incubatee
                                            @elseif($startup->status == 2)
                                                MVP
                                            @elseif($startup->status == 3)
                                                Post MVP
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                                <div class="brochures mb-50 mt-50">
                                    <h3>Brochures</h3>
                                    <p>
                                        Do you want to know more about {{ $startup->name }}? download our brochure for more information.
                                    </p>
                                    <div class="pdf-btn">
                                        <a class="readon learn-more pdf" href="#">Download Now<i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>

                                <div class="services-add">
                                    <div class="address-item mb-35">
                                        <div class="address-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <h2 class="title">Have any Questions? <br> Call {{ $startup->name }}!</h2>
                                    <div class="contact">
                                        <a href="{{ $startup->phone }}">{{ $startup->phone }}</a>
                                    </div>
                                </div>

                            </div> --}}
                        </div>
                   </div>
                </div>
                <!-- Services Single End -->

@endsection
