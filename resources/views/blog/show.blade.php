@extends('layouts.blog')
@section('title')
@parent
| {{ $post->title ?? 'Blog Post' }}
@endsection

@section('main')

<article class="single">
    <div class="post-image">
        <div class="post-heading">
            <h3><a href="#">{{ $post->title }}</a></h3>
        </div>
        <img src="/images/blog/img1.jpg" alt="" />
    </div>
    <div class="meta-post">
        <ul>
            <li>By <a href="/blog/author/{{ $post->user->id }}" class="author">{{ $post->user->name }}</a></li>
            <li>On <a href="#" class="date">{{  \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a></li>
            <li>Category: <a href="/blog/category/{{ $post->category->id }}">{{ $post->category->name }}</a></li>
            <li>Views: <a href="#" class="votes"> {{ $post->votes }}</a></li>
            <li>
            <span class="panel" data-id="{{ $post->id }}">

                <span class="like-btn thumbs-up {{ auth()->user()->hasLiked($post) ? 'like-post' : '' }}">@fa('fa-thumbs-up')</span>

                <span id="like{{$post->id}}-count">{{ $post->likers()->get()->count() ?? 0 }}</span>
                
                <span class="like-btn thumbs-down {{ auth()->user()->hasLiked($post) ? 'like-post' : '' }}">@fa('fa-thumbs-down')</span>
            </span>
            </li>
            
        </ul>
    </div>
    <div class="post-entry">
        <p>
            {{ $post->content }}
        </p>
    </div>
</article>

<!-- author info -->
<div class="about-author">
    <a href="#" class="thumbnail align-left"><img src="/images/blog/avatar.png" alt="" /></a>
    <h5><strong><a href="#">John doe</a></strong></h5>
    <p>
        Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No
        mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.
    </p>
</div>

<div class="comment-area">
    <h4>{{ count($post->comments) ?? 0 }} Comments</h4>
    @include('blog.partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])

    <div class="mb-30"></div>
    @auth
    <h4>Leave your comment</h4>
    <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="body" class="form-control">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Add Comment">
        </div>
    </form>
    @endauth
</div>
</div>
@endsection

@push('scripts')
<script>

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('span.thumbs-up i').click(function(){
            var btn = $(this);
            var id = $(this).parents('.panel').data('id');
            var countUp = $('#like'+id+'-count').text()? $('#like'+id+'-count').text():0;
            $.ajax({
                url: "/blog/like",
                type:"POST",
                data:{
                    id:id,
                },
                success:function(response){
                    $('#like'+id+'-count').text(parseInt(countUp)+1);
                    $(btn).addClass("like-post");
                },
            });
        });
        $('span.thumbs-down i').click(function(){
            var btn = $(this);
            var id = $(this).parents('.panel').data('id');
            var countDown = $('#like'+id+'-count').text()? $('#like'+id+'-count').text():0;
            $.ajax({
                url: "/blog/like",
                type:"POST",
                data:{
                    id:id,
                },
                success:function(response){
                    $('#like'+id+'-count').text(parseInt(countDown)-1);
                    $(btn).removeClass("like-post");
                },
            });
        });
    }); 
</script>
@endpush