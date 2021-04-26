@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Blog article')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img4" style="background-image:url({{Storage::url('background/'.$background->b2_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title new-title pb-10">{{ $post->title }}</h1>
            <ul>
                <li title="{{ $settings->name }} - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
                <li title="Go to Blog"><a class="active" href="index.html">Blog</a></li>
                @foreach($post->categories as $key => $category)
                    <li title="Go to the {{$category->name}} category archives"><a class="active" href="{{ route('blog.categories',$category->slug) }}">{{$category->name}}</a></li>
                @endforeach
                <li>{{ $post->title }}</li>
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
                                        <a href="{{route('blog.show',$post->slug)}}"><img src="{{Storage::url('posts/'.$post->image)}}" alt=""></a>
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
                        <div class="col-lg-12">
                            <div class="blog-details">
                                <div class="bs-img mb-35">
                                    <a href="#"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{ $post->title }}"></a>
                                </div>
                                <div class="blog-full">
                                    <ul class="single-post-meta">
                                        <li>
                                            <span class="p-date"><i class="fa fa-calendar-check-o"></i>{{$post->created_at->format('M d, Y')}}</span>
                                        </li>
                                        <li>
                                            <span class="p-date"> <i class="fa fa-user-o"></i>{{$post->user->name}}</span>
                                        </li>
                                        <li class="Post-cate">
                                            <div class="tag-line">
                                                <i class="fa fa-book"></i>
                                                @foreach($post->categories as $key => $category)
                                                    <a href="{{ route('blog.categories',$category->slug) }}">{{$category->name}}</a>
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="post-comment"> <i class="fa fa-comments-o"></i>{{$post->comments_count}}</li>
                                    </ul>
                                    <p>
                                        <h3>{{$post->title}}</h3>
                                        {!! ($post->body) !!}
                                        @if ($post->quote)
                                            <blockquote><p>{!! $post->quote !!}<br>
                                                <cite>#</cite></p>
                                            </blockquote>
                                        @endif
                                    </p>
                                    <hr>
                                    <div class="content-tags">
                                        <h5>Tags:</h5>
                                        <ul class="tag-inner">

                                            @foreach($post->tags as $tag)
                                            <li><a href="javascript:void(0);"><span class="badge badge-default">{{$tag->name}}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <h3 class="comment-title">{{$post->comments_count}} comment(s) on “{{ $post->title }}”</h3>
                                    @include('frontend.pages.comment', ['comments' => $post->comments, 'post_id' => $post->id, 'depth' => 3])


                                    @auth
                                        <div class="reply-head comment-form" id="commentFormContainer">
                                            <h3 class="comment-title">Leave a cpmment</h3>
                                            {{-- <p>Your email address will not be published. Required fields are marked *</p> --}}
                                            <div class="comment-note">
                                                <div id="form-messages"></div>
                                                <form id="commentForm" class="form comment_form" method="post" action="{{route('blog.comment', $post->id)}}">
                                                    @csrf
                                                    <fieldset>
                                                        <div class="row">
                                                            {{-- <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                                                <input class="from-control" type="text" id="name" name="name" placeholder="Name*" required="">
                                                            </div>
                                                            <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                                                <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail*" required="">
                                                            </div> --}}
                                                            <div class="col-lg-12 mb-30">
                                                                <textarea class="from-control" id="message" name="comment" placeholder="Your message Here" required=""></textarea>
                                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                                <input type="hidden" name="parent_id" id="parent_id" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="btn-part">
                                                        <a class="readon learn-more post" type="submit" href="#"><span class="comment_btn comment">Post Comment</span><span class="comment_btn reply" style="display: none;">Reply Comment</span></a>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                    <p>You need to <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a> to comment.</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
@endsection
@push('scripts')
<script>
$(document).ready(function(){

    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });

 })(jQuery)
})
</script>
@endpush
