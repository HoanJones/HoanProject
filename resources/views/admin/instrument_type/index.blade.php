@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Loại nhạc cụ</h4>
                    <div class="tab-content">
                        @can('instrument_type-create')
                            <a class="btn btn-success" href="{{ route('instrument_type.create') }}"> Thêm loại nhạc cụ mới</a>
                        @endcan
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên loại nhạc cụ</th>
                                <th>Mô tả</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($data as $key => $instrument_type)
                                <tr>
                                    <td>{{ $instrument_type->id }}</td>
                                    <td>{{ $instrument_type->name }}</td>
                                    <td>{{ $instrument_type->description }}</td>
                                    <td>
                                        @can('instrument_type-update')
                                            <a class="btn btn-info btn-sm mr-2"
                                               href="{{ route('instrument_type.edit', $instrument_type->id) }}">Sửa</a>
                                        @endcan
                                        @can('instrument_type-delete')
                                            <form action="{{route('instrument_type.destroy', $instrument_type->id)}}" method='POST'>
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
