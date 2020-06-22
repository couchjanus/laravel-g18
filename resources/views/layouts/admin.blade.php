@extends('layouts.master')
@section('title')
   Admin Page
@endsection
@section('styles')
    <!-- Include Styles -->
    @include('layouts.partials.admin._styles')    
@endsection

@section('page')
<div class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <!-- Include Nav -->
    @include('layouts.partials.admin._nav')
    <div class="app-body">
      @include('layouts.partials.admin._sidebar')
      <main class="main">
        <div style="padding-top: 20px" class="container-fluid">
            @yield('content')
        </div>
      </main>
    </div>
</div>    
@endsection

@section('scripts')
    <!-- Include Scripts -->
    @include('layouts.partials.admin._scripts')
@endsection
