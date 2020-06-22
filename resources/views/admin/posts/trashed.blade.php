@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.posts.index") }}">
            {{ __('All Post') }}
        </a>
        <a class="btn btn-success" href="{{ route("admin.posts.create") }}">
            {{ __('Add Post') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('Trashed Post List') }}
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
                            <form action="{{ route('admin.posts.restore',  $post->id) }}" method="post" style="display: inline">
                                @csrf
                                <button title="Restore post" type="submit" class="btn btn-xs btn-primary">{{ __('Restore') }}</button>
                            </form>    
                            <form action="{{ route('admin.posts.force',  $post->id) }}" method="post" style="display: inline">
                                @method('DELETE') 
                                @csrf
                                <button title="Force Delete Post" type="submit" class="btn btn-xs btn-danger">{{ __('Delete') }}</button>
                            </form>  
                        </td>
                    </tr>
                    @empty
                         <p>No Trashed Posts yet...</p>
                    @endforelse
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
