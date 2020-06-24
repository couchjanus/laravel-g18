@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.tags.create") }}">
            {{ __('Add Tag') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('Tag List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-tag">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('Tag Id') }}
                        </th>
                        <th>
                            {{ __('Tag Name') }}
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
                    @forelse($tags as $key => $tag)
                    <tr data-entry-id="{{ $tag->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $tag->id ?? '' }}
                        </td>
                        <td>
                            {{ $tag->name ?? '' }}
                        </td>

                        <td>
                            {{ $tag->created_at ?? '' }}
                        </td>

                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.tags.show', $tag->id) }}">

                                {{ __('view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.tags.edit', $tag->id) }}">
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('admin.tags.destroy',  $tag->id) }}" method="tag" style="display: inline-block;">@method('DELETE') @csrf
                                <button title="Delete tag" type="submit" class="btn btn-xs btn-danger">{{ __('delete') }}</button>
                            </form>  
                        </td>

                    </tr>
                    @empty
                        <p>No tags yet...</p>
                    @endforelse
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
