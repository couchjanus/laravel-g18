@extends('layouts.blog')
@section('title')
 @parent
  | {{ $title ?? 'Blog Posts List' }}
@endsection

@section('main')
    <h1>{{ $title ?? 'Posts List' }}</h1>

    {{-- @isset($posts) --}}
    
    @forelse($posts as $post)
    
        <article>
          <div class="row">
            
            <div class="span">
                <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="/blog/show/{{ $post->id }}">{{ $post->title }}</a></h3>
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
                    <a href="/blog/show/{{ $post->id }}" class="readmore">Read more <i class="icon-angle-right"></i></a>
                </div>
            </div>
          
          </div>
        </article>
    @empty
      <p>No posts yet...</p>
    @endforelse

    {{-- @endisset

    @empty($posts)
      <h2>No posts yet..</h2>
    @endempty --}}
      
@endsection
