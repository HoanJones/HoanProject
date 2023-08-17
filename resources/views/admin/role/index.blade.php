@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Quản lý role</h4>
                    <div class="tab-content">
                        @can('role-create')
                            <a class="btn btn-success" href="{{ route('role.create') }}"> Tạo Role mới</a>
                        @endcan
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role-update')
                                            <a class="btn btn-info btn-sm mr-2"
                                               href="{{ route('role.edit', $role->id) }}">Sửa</a>
                                        @endcan
                                        @can('role-delete')
                                            <form action="{{route('role.destroy', $role->id)}}" method='POST'>
                                                @csrf
                                                @METHOD('DELETE')
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                        class="btn btn-danger btn-sm" style="margin-top: 0.5rem">Xóa
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
