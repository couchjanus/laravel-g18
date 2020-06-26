@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.users.create") }}">
            {{ __('Add User') }}
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ __('User List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
         {{ $users->links() }}
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('Id') }}
                        </th>
                        <th>
                            {{ __('User name') }}
                        </th>
                        <th>
                            {{ __('User email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr data-entry-id="{{ $user->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $user->id ?? '' }}
                        </td>
                        <td>
                            {{ $user->name ?? '' }}
                        </td>
                        <td>
                            {{ $user->email ?? '' }}
                        </td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                {{ __('view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                {{ __('edit') }}
                            </a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" style="display: inline-block;">@method('DELETE') @csrf
                                <button title="Delete post" type="submit" class="btn btn-xs btn-danger">{{ __('delete') }}</button>
                            </form>  
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
@section('allscripts')
@parent
<script>
  

</script>
@endsection
