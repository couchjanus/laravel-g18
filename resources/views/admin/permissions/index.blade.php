@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.permissions.create") }}">
            {{ __('Add permission') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('Permission List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('Permission Id') }}
                        </th>
                        <th>
                            {{ __('Permission Tile') }}
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
                    @forelse($permissions as $key => $permission)
                    <tr data-entry-id="{{ $permission->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $permission->id ?? '' }}
                        </td>
                        <td>
                            {{ $permission->title ?? '' }}
                        </td>

                        <td>
                            {{ $permission->created_at ?? '' }}
                        </td>

                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.permissions.show', $permission->id) }}">

                                {{ __('view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('admin.permissions.destroy',  $permission->id) }}" method="post" style="display: inline-block;">@method('DELETE') @csrf
                                <button title="Delete permission" type="submit" class="btn btn-xs btn-danger">{{ __('delete') }}</button>
                            </form>  
                        </td>

                    </tr>
                    @empty
                        <p>No permissions yet...</p>
                    @endforelse
                </tbody>
            </table>
            {{ $permissions->links() }}
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
