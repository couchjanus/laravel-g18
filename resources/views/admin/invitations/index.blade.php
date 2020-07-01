@extends('layouts.admin')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.home") }}">
            {{ __('Dashboard') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ __('Invitations List') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-tag">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Invitation Link</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($invitations as $invitation)
                    <tr>
                        <td>
                            <form action="{{ route('admin.send.invite', ['id' => $invitation->id]) }}" method="post"
                                style="display: inline"> @csrf
                                <button title="Invite user" type="submit"
                                    class="text-white font-bold py-1 px-3 rounded text-xs bg-red-300 hover:bg-red-500">{{ $invitation->email }}</button>
                            </form>
                        </td>
                        <td>{{ $invitation->created_at ?? '' }}</td>
                        <td>
                            <kbd>{{ $invitation->getLink() ?? '' }}</kbd>
                        </td>
                    </tr>
                  @empty
                        <p>No invitation requests!</p>
                  @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection
