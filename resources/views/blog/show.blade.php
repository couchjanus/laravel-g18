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
            <li>By <a href="/blog/author/{{ $post->user_id }}" class="author">{{ $post->username }}</a></li>
            <li>On <a href="#" class="date">{{  \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a></li>
            <li>Category: <a href="/blog/category/{{ $post->category_id }}">{{ $post->name }}</a></li>
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
    <h4>4 Comments</h4>
    <div class="media">
        <a href="#" class="pull-left"><img src="/images/blog/avatar.png" alt="" class="img-circle" /></a>
        <div class="media-body">
            <div class="media-content">
                <h6><span>March 12, 2020</span> Michael Simpson</h6>
                <p>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </p>

                <a href="#" class="align-right">Reply</a>
            </div>
        </div>
    </div>

    <div class="mb-30"></div>
    <h4>Leave your comment</h4>

    <form id="commentform" action="#" method="post" name="comment-form">
        <div class="row">
            <div class="col-md-4">
                <input type="text" placeholder="* Enter your full name" />
            </div>
            <div class="col-md-4">
                <input type="text" placeholder="* Enter your email address" />
            </div>
            <div class="col-md-8 mt-10">
                <input type="text" placeholder="Enter your website" />
            </div>
            <div class="col-md-8 mt-10">
                <p>
                    <textarea class="input-block-level" placeholder="*Your comment here"></textarea>
                </p>
                <p>
                    <button class="btn btn-theme btn-medium margintop10" type="submit">Submit comment</button>
                </p>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
