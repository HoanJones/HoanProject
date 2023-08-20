@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Hoạt động</h4>
                    <div class="tab-content">
                        @can('schedule-create')
                            <a class="btn btn-success" href="{{ route('schedule.create') }}"> Tạo hoạt động mới</a>
                        @endcan
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên hoạt động</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Địa điểm</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($data as $key => $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ $schedule->schedule_name }}</td>
                                    <td>{{ $schedule->start_time }}</td>
                                    <td>{{ $schedule->end_time }}</td>
                                    <td>{{ $schedule->place }}</td>
                                    <td>{{ $schedule->status }}</td>
                                    <td>
                                        @can('schedule-update')
                                            <a class="btn btn-info btn-sm mr-2"
                                               href="{{ route('schedule.edit', $schedule->id) }}">Sửa</a>
                                        @endcan
                                        @can('schedule-delete')
                                            <form action="{{route('schedule.destroy', $schedule->id)}}" method='POST'>
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
