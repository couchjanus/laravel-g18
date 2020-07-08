@extends('layouts.app')

@section('content')
  
    <div class="content">
      <ul class="breadcrumb">
        <li>{{ Breadcrumbs::render('main') }} <i class="icon-angle-right"></i></li>
    </ul>
                <div class="title m-b-md">
                    Laravel
                </div>
                <hr>
                @double(169995) // Если цена равна, например, 169995
                <i class="fa fa-bars" aria-hidden="true"></i>
                @fa('fa-bars')

                <x-modal type="error" class="mb-4">
                    
                </x-modal>

                <x-tag-cloud>
                    
                </x-tag-cloud>
            </div>
            
@endsection
