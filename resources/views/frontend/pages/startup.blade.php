@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Startup')

@section('main-content')
                <!-- Breadcrumbs Start -->
                <div class="rs-breadcrumbs img2" style="background-image:url({{Storage::url('background/'.$background->s2_bg)}});">
                    <div class="breadcrumbs-inner text-center">
                        <h1 class="page-title">{{ $startup->name }}</h1>
                        <ul>
                            <li title="Roar Nigeria Hub - Where innovation lives">
                                <a class="active" href="{{ route('home') }}">Home</a>
                            </li>
                            <li title="Go To Startups">
                                <a class="active" href="{{ route('startups') }}">Startups</a>
                            </li>
                            <li>{{ $startup->name }}</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumbs End -->


                <!-- Services Single Start -->
                <div class="rs-case-studies-single pt-120 pb-120 md-pt-80 md-pb-80">
                   <div class="container">
                        <div class="row">
                            <div class="col-lg-8 md-mb-50">
                                <div class="services-img">
                                    <img src="{{ Storage::url('startups/'.$startup->image) }}" alt="">
                                </div>

                                <h2 class="mt-34">{{ $startup->name }}</h2>

                                <p><b>Idea/Solution:</b> {{ $startup->idea }}</p>

                                <p>{!! $startup->description !!}</p>

                                <div class="services-img">
                                    <img src="assets/images/project/single/2.jpg" alt="">
                                </div>

                            </div>
                            <div class="col-lg-4 pl-32 md-pl-15">
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

                            </div>
                        </div>
                   </div>
                </div>
                <!-- Services Single End -->

@endsection
