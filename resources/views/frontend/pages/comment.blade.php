

@foreach ($comments as $comment)
    @php $dep = $depth-1; @endphp

    <div  @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="comment-body">
            @if ($comment->user_info['photo'])
                <div class="rstheme-logo">
                    <img src="{{$comment->user_info['photo']}}" alt="">
                </div>
            @else
                <div class="rstheme-logo">
                    <img src="{{asset('backend/img/avatar.png')}}" alt="">
                </div>
            @endif
            <div class="comment-meta">
                <span><a href="#">{{$comment->user_info['name']}}</a></span>
                <a href="#">{{$comment->created_at->format('M d Y')}} at {{$comment->created_at->format('g: i a')}}</a>
                <p class="mb-15">
                    {{$comment->comment}}
                </p>
                <div class="btn-part">
                <a class="readon btn-reply reply" data-id="{{$comment->id}}" href="#">Reply</a>
                <a class="readon btn-reply cancel" style="display: none" href="#">Cancel</a>
                </div>
            </div>
        </div><br>

        @include('frontend.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])

    </div>
@endforeach

