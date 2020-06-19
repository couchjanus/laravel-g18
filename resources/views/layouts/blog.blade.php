@extends('layouts.app')
@section('title')
   Blog Page
@endsection

@section('sidebar')
    <div class="col-md-4 blog-sidebar">
        <!-- Include sidebar -->
        @include('blog.partials._sidebar')
    </div>
@endsection
        
@section('content')
    <div class="col-md-8 blog-main">
        @yield('main')
    </div>
@endsection
    
