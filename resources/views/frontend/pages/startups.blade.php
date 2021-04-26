@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Startups')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img3" style="background-image:url({{Storage::url('background/'.$background->s1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">Meet our startups</h1>
            <ul>
                <li title="Roar Nigeria Hub - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
            <li>Startups</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Project Section Start -->
    <div class="rs-project style3 modify1 case-style3">
        <div class="container">
            <div class="row">
                @foreach ($startups as $startup)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="{{ route('startup', $startup->id) }}"><img src="{{ Storage::url('startups/'.$startup->image) }}" alt="{{ $startup->name }}"></a>
                            </div>
                            <div class="project-content">
                                <div class="portfolio-inner">
                                    <h3 class="title"><a href="{{ route('startup', $startup->id) }}">{{ $startup->name }}</a></h3>
                                    <span class="category"><a href="{{ route('startup', $startup->id) }}">{{ $startup->idea }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Project Section End -->
@endsection
