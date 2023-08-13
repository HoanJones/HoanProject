@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Quản lý role</h4>
                    <div class="tab-content">
                        @can('user-create')
                            <a class="btn btn-sm btn-success" href="{{ route('usermanagement.create') }}"> Create New
                                User</a>
                        @endcan
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($data as $k => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->getRoleNames()!== null)
                                            <label>{{ $user->getRoleNames() }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        @can('user-update')
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('usermanagement.edit', $user->id) }}">Edit</a>
                                        @endcan
                                        @can('user-delete')
                                            <form action="{{ route('usermanagement.destroy', $user->id) }}"
                                                  method="post">
                                                @csrf
                                                @METHOD('DELETE')
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                        class="btn btn-danger btn-sm" style="margin-top: 0.5rem">Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <ul class="pagination pagination-primary" style="text-align:center;">
                            {{$data->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
