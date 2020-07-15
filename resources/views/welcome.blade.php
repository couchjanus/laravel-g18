@extends('layouts.app')

@section('content')


<section id="content">


    <div class="row">
        @foreach ($favcategories as $item)
        <div class="col-4">
            <div class="box flyLeft">
                <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-star active icon-3x"></i>
                </div>
                <div class="text">
                    <h4>{{ $item->name }}</h4>
                    <p>
                        {{ $item->description }}
                    </p>
                    <a href="{{ route('blog.by.category', $item->id) }}">Learn More</a>
                </div>
            </div>
        </div>

    @endforeach

    </div>

    <div class="row">
        <div class="col-12">
            <div class="solidline"></div>
        </div>
    </div>

    <div class="row">
      <div class="col-12">

        <div class="row">
            <div class="col-12">
                    <div class="aligncenter">
                        <h3>Our <strong>Favorites</strong></h3>
                        <p>Lorem ipsum dolor sit amet, labores dolorum scriptorem eum an, te quodsi sanctus
                            neglegentur.
                        </p>
                    </div>
            </div>
        </div>

        <div class="row">
            @foreach ($favorites as $item)
                <div class="col-3">
                    <div class="pricing-box-wrap animated-fast flyIn">
                        <div class="pricing-heading">
                            <h3><strong>{{ $item->short_title }}</strong></h3>
                        </div>
                        <div class="pricing-terms">
                            <h6><img src="{{ $item->cover_path }}" alt="{{ $item->short_title }}" /></h6>
                        </div>
                        <div class="pricing-action">
                            <a href="{{ route('blog.show', $item->slug) }}" class="btn btn-medium btn-theme"><i class="icon-chevron-down"></i> Read more</a>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
      </div>
    </div>

<div class="row">
      <div class="col-12">

        <div class="row">
            <div class="col-12">
                    <div class="aligncenter">
                        <h3>Recent <strong>Posts</strong></h3>
                        <p>Lorem ipsum dolor sit amet, labores dolorum scriptorem eum an, te quodsi sanctus
                            neglegentur.
                        </p>
                    </div>
            </div>
        </div>

        <div class="row">
            @foreach ($recents as $item)
                <div class="col-3">
                    <div class="pricing-box-wrap animated-fast flyIn">
                        <div class="pricing-heading">
                            <h3><strong>{{ $item->short_title }}</strong></h3>
                        </div>
                        <div class="pricing-terms">
                            <h6><img src="{{ $item->cover_path }}" alt="{{ $item->short_title }}" /></h6>
                        </div>
                        <div class="pricing-action">
                            <a href="{{ route('blog.show', $item->slug) }}" class="btn btn-medium btn-theme"><i class="icon-chevron-down"></i> Read more</a>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
      </div>
    </div>
</section>



@endsection
