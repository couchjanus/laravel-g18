@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.categories.create") }}">
            {{ __('Add category') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('category List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-category">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('category Id') }}
                        </th>
                        <th>
                            {{ __('category Name') }}
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
                    @forelse($categories as $key => $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $category->id ?? '' }}
                        </td>
                        <td>
                            {{ $category->name ?? '' }}
                        </td>

                        <td>
                            {{ $category->created_at ?? '' }}
                        </td>

                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $category->id) }}">

                                {{ __('view') }}
                            </a>

                            <a class="btn btn-xs btn-info" href="{{ route('admin.categories.edit', $category->id) }}">
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('admin.categories.destroy',  $category->id) }}" method="post" style="display: inline-block;">@method('DELETE') @csrf
                                <button title="Delete category" type="submit" class="btn btn-xs btn-danger">{{ __('delete') }}</button>
                            </form>  
                        </td>

                    </tr>
                    @empty
                        <p>No categories yet...</p>
                    @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent

@endsection
