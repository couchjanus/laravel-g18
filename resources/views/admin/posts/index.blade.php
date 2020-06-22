@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.posts.create") }}">
            {{ __('Add Post') }}
        </a>
        <a class="btn btn-warning" href="{{ route("admin.posts.trashed") }}">
            {{ __('Trashed Posts') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('Post List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Post">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('Post Id') }}
                        </th>
                        <th>
                            {{ __('Post Title') }}
                        </th>
                        <th>
                            {{ __('Created At') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $key => $post)
                    <tr data-entry-id="{{ $post->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $post->id ?? '' }}
                        </td>
                        <td>
                            {{ $post->title ?? '' }}
                        </td>

                        <td>
                            {{ $post->created_at ?? '' }}
                        </td>

                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.posts.show', $post->id) }}">

                                {{ __('view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.posts.edit', $post->id) }}">
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('admin.posts.destroy',  $post->id) }}" method="post" style="display: inline-block;">@method('DELETE') @csrf
                                <button title="Delete post" type="submit" class="btn btn-xs btn-danger">{{ __('delete') }}</button>
                            </form>  
                        </td>

                    </tr>
                    @empty
                        <p>No posts yet...</p>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $posts->links() }} --}}
            {{ $posts->onEachSide(2)->links() }}

        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
