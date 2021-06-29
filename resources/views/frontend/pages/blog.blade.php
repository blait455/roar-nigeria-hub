@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Blog')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img4" style="background-image:url({{Storage::url('background/'.$background->b1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">Blog</h1>
            <ul>
                <li title="{{ $settings->name }} - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
               <li>Blog</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start -->
    <div class="rs-inner-blog pt-120 pb-120 md-pt-90 md-pb-90">
        <div class="container">
            <div class="row">

                @include('frontend.pages.sidebar')
                
                <div class="col-lg-8 pr-35 md-pr-15">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-12 mb-50">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="{{route('blog.show',$post->slug)}}"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{ $post->photo }}"></a>
                                        <ul class="post-categories">
                                            @foreach($post->categories as $key => $category)
                                                <li><a href="{{ route('blog.categories',$category->slug) }}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title"><a href="{{route('blog.show',$post->slug)}}">{{ $post->title }}</a></h3>
                                        <div class="blog-meta">
                                            <ul class="btm-cate">
                                                <li>
                                                    <div class="blog-date">
                                                        <i class="fa fa-calendar-check-o"></i> {{$post->created_at->format('d M, Y. D')}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="author">
                                                        <i class="fa fa-user-o"></i>
                                                            {{$post->user->name}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="author">
                                                        <i class="fa fa-comments-o"></i>
                                                        {{$post->comments_count}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="author">
                                                        <i class="fa fa-eye"></i>
                                                        {{$post->view_count}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="author">
                                                        <i class="fa fa-tags"></i>
                                                        @foreach($post->tags as $key => $tag)
                                                            <span>{{$tag->name}}</span>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="blog-desc">
                                            {!! \Illuminate\Support\Str::limit($post->body,120) !!}
                                        </div>
                                        <div class="blog-button inner-blog">
                                            <a class="blog-btn" href="{{route('blog.show',$post->slug)}}">Continue Reading</a>
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
