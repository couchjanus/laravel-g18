@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.roles.create") }}">
            {{ __('Add role') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('role List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('Role Id') }}
                        </th>
                        <th>
                            {{ __('Role Tile') }}
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
                    @forelse($roles as $key => $role)
                    <tr data-entry-id="{{ $role->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $role->id ?? '' }}
                        </td>
                        <td>
                            {{ $role->title ?? '' }}
                        </td>

                        <td>
                            {{ $role->created_at ?? '' }}
                        </td>

                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}">

                                {{ __('view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', $role->id) }}">
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('admin.roles.destroy',  $role->id) }}" method="post" style="display: inline-block;">@method('DELETE') @csrf
                                <button title="Delete role" type="submit" class="btn btn-xs btn-danger">{{ __('delete') }}</button>
                            </form>  
                        </td>

                    </tr>
                    @empty
                        <p>No roles yet...</p>
                    @endforelse
                </tbody>
            </table>
            {{ $roles->links() }}
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
