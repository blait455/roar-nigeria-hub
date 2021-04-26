@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Events')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img4" style="background-image:url({{Storage::url('background/'.$background->e1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">Events</h1>
            <ul>
                <li title="{{ $settings->name }} - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
               <li>Events</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start -->
    <div class="rs-inner-blog pt-120 pb-120 md-pt-90 md-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-35 md-pr-15">
                    <div class="row">
                        @foreach ($events as $event)
                            <div class="col-lg-6 mb-50">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="{{route('event',$event->id)}}"><img src="{{Storage::url('events/'.$event->image)}}" alt="{{ $event->title }}"></a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title"><a href="{{route('event',$event->id)}}">{{ $event->title }}</a></h3>
                                        <div class="blog-meta">
                                            <ul class="btm-cate">
                                                <li>
                                                    <div class="blog-date">
                                                        <i class="fa fa-calendar-check-o"></i> {{$event->created_at->format('d M, Y. D')}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="blog-desc">
                                            {!! \Illuminate\Support\Str::limit($event->description,120) !!}
                                        </div>
                                        <div class="blog-button inner-blog">
                                            <a class="blog-btn" href="{{route('event',$event->id)}}">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
@endsection
