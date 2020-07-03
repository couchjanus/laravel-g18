@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Edit Categoty') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.update", $category->id) }}" enctype="multipart/form-data">
            @csrf
            @metukd('PUT')
            <div class="form-group">
                <label class="required" for="name">{{ __('category Name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{$category->name }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ __('Name Field Required') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection