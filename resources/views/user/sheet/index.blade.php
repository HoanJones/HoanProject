@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Sheet - Cảm âm</h4>
                    <div class="tab-content">
                        @can('sheet-create')
                            <a class="btn btn-success" href="{{ route('sheet.create') }}"> Tạo Sheet - Cảm âm mới</a>
                        @endcan
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên Sheet</th>
                                <th>Link ảnh sheet</th>
                                <th>Người đăng tải</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($data as $key => $sheet)
                                <tr>
                                    <td>{{ $sheet->id }}</td>
                                    <td>{{ $sheet->name }}</td>
                                    <td><a target="_blank" rel="noreferrer noopener" 
                                        href="{{ $sheet->sheet_image }}">Link sang drive</a></td></td>
                                    <td>{{ $sheet->user_name }}</td>
                                    <td>
                                        @can('sheet-update')
                                            <a class="btn btn-info btn-sm mr-2"
                                               href="{{ route('sheet.edit', $sheet->id) }}">Sửa</a>
                                        @endcan
                                        @can('sheet-delete')
                                            <form action="{{route('sheet.destroy', $sheet->id)}}" method='POST'>
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
