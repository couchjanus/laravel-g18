@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Show Post') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                {{ __('Back To List') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ __('Post Id') }}
                        </th>
                        <td>
                            {{ $post->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            
                            {{ __('Post Title') }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Post Status') }}
                        </th>
                        <td>
                            {{ $post->published }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Category') }}
                        </th>
                        <td>
                            {{ $post->category_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Author') }}
                        </th>
                        <td>
                            {{ $post->user_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Content') }}
                        </th>
                        <td>
                            {{ $post->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ __('Votes') }}
                        </th>
                        <td>
                            {{ $post->votes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                    {{ __('Back To List') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection