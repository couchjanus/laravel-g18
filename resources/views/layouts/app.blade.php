@extends('layouts.master')
@section('title')
   Front Page
@endsection
@section('meta')
   @include('layouts.partials.front._meta')
@endsection
@section('styles')
    <!-- Include Styles -->
    @include('layouts.partials.shared._styles')    
@endsection

@section('page')
    <!-- Include Nav -->
    @include('layouts.partials.front._nav')
    <main class="container">
        <div class="row">
            @yield('sidebar')
            @yield('content')
        </div>
    </main>
    <!-- Include Footer -->
    @include('layouts.partials.front._footer')
@endsection

@section('allscripts')
    <!-- Include Scripts -->
    @include('layouts.partials.shared._scripts')
@endsection
