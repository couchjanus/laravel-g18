@extends('layouts.blog')
@section('title')
 @parent
  | {{ $title ?? 'Blog Posts List' }}
@endsection

@section('main')
    <ul class="breadcrumb">
        <li>{{ Breadcrumbs::render('blog') }} <i class="icon-angle-right"></i></li>
    </ul>
    <hr>

    <h1>{{ $title ?? 'Posts List' }}</h1>
    @forelse($posts as $post)
        <article>
          <div class="row">
            
            <div class="span">
                <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="/blog/show/{{ $post->id }}">{{ $post->title }}</a></h3>
                    </div>

                    <img src="{{ $post->cover_path }}" alt="{{ $post->title }}" />
                </div>
                <div class="meta-post">
                    <ul>
                      <li>By <a href="/blog/author/{{ $post->user->id }}" class="author">{{ $post->user->name }}</a></li>
                      <li>On <a href="#" class="date">{{  \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a></li>
                      <li>Category: <a href="/blog/category/{{ $post->category->id }}">{{ $post->category->name }}</a></li>
                      <li>Views: <a href="#" class="votes"> {{ $post->votes }}</a></li>
                    </ul>
                </div>
                <div class="post-entry">
                    <p>
                      {{ $post->description }}
                    </p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="readmore">Read more <i class="icon-angle-right"></i></a>
                </div>
            </div>
          
          </div>
        </article>
    @empty
      <p>No posts yet...</p>
    @endforelse
@endsection
