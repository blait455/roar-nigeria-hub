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