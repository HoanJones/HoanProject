@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Sự kiện</h4>
                    <div class="tab-content">
                        @can('event-create')
                            <a class="btn btn-success" href="{{ route('event.create') }}"> Tạo Sự kiện mới</a>
                        @endcan
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sự kiện</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Địa điểm</th>
                                <th>Số lượng TV</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($data as $key => $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->start_time }}</td>
                                    <td>{{ $event->end_time }}</td>
                                    <td>{{ $event->event_address }}</td>
                                    <td>{{ $event->member_quantity }}</td>
                                    <td>
                                        @can('event-update')
                                            <a class="btn btn-info btn-sm mr-2"
                                               href="{{ route('event.edit', $event->id) }}">Sửa</a>
                                        @endcan
                                        @can('event-delete')
                                            <form action="{{route('event.destroy', $event->id)}}" method='POST'>
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
