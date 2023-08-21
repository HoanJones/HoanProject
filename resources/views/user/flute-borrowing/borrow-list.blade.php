@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Nhạc cụ đang thuê</h4>
                    <div class="tab-content">
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Loại nhạc cụ</th>
                                <th>Tên nhạc cụ</th>
                                <th>Chủ sở hữu</th>
                                <th>Trạng thái</th>
                                <th>Thời gian mượn</th>
                                <th>Thời gian trả</th>
                            </tr>
                            @foreach ($data as $k => $flute)
                                <tr>
                                    <td>{{ $flute->id }}</td>
                                    <td>{{ $flute->instrument_type_name }}</td>
                                    <td>{{ $flute->instrument_name }}</td>
                                    <td>{{ $flute->user_name }}</td>
                                    <td>{{ $flute->status === 2 ? 'Đang xử lý' : 'Được thuê' }}</td>
                                    <td>{{ reformatDateToDMY($flute->borrowing_date) }}</td>
                                    <td>{{ reformatDateToDMY($flute->due_date) }}</td>
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
