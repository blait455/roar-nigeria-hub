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
                <div class="col-lg-4 col-md-12 order-last">
                    <div class="widget-area">
                        <div class="search-widget mb-50">
                            <div class="search-wrap">
                                <form class="form" method="GET" action="{{route('blog.search')}}">
                                    <input type="search" placeholder="Searching..." name="search" class="search-input" value="">
                                    <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="recent-posts mb-50">
                            <div class="widget-title">
                                <h3 class="title">Latest Posts</h3>
                            </div>
                            @foreach ($latest_posts as $post)
                                <div class="recent-post-widget">
                                    <div class="post-img">
                                        <a href="{{route('blog.show',$post->slug)}}"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{ $post->photo }}"></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="{{route('blog.show',$post->slug)}}">{{ $post->title }}</a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            {{$post->created_at->format('d M, y')}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="categories mb-50">
                            <div class="widget-title">
                                <h3 class="title">Categories</h3>
                            </div>
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog.categories',$category->slug) }}">{{ $category->name }}</a><span class=""> ({{ $category->posts_count }})</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
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
