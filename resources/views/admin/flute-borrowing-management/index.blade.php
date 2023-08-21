@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Danh sách nhạc cụ</h4>
                    <div class="tab-content">
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Loại nhạc cụ</th>
                                <th>Tên nhạc cụ</th>
                                <th>Chủ sở hữu</th>
                                <th>Trạng thái</th>
                                <th>Người mượn</th>
                                <th>Thời gian mượn</th>
                                <th>Thời gian trả</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($data as $k => $flute)
                                <tr>
                                    <td>{{ $flute->id }}</td>
                                    <td>{{ $flute->instrument_type_name }}</td>
                                    <td>{{ $flute->instrument_name }}</td>
                                    <td>{{ $flute->instrument_owner_name }}</td>
                                    <td>{{ \App\Enums\User\InstrumentStatusEnum::getKeyByValue($flute->status) }}</td>
                                    <td>{{ $flute->user_borrow_name }}</td>
                                    <td>{{ reformatDateToDMY($flute->borrowing_date) }}</td>
                                    <td>{{ reformatDateToDMY($flute->due_date) }}</td>
                                    <td>
                                        @if($flute->status === 2)
                                            <form action="{{ route('flute-borrowing-management.accept',$flute->instrument_id) }}"
                                                  method="post">
                                                @csrf
                                                @METHOD('PUT')
                                                <button onclick="return confirm('Xác nhận cho người dùng này thuê ?')"
                                                        class="btn btn-success btn-sm" style="margin-top: 0.5rem">Xác nhận
                                                </button>
                                            </form>
                                            <form action="{{ route('flute-borrowing-management.reject', [$flute->instrument_id,$flute->id]) }}"
                                                  method="post">
                                                @csrf
                                                @METHOD('PUT')
                                                <button onclick="return confirm('Từ chối cho người dùng này thuê ?')"
                                                        class="btn btn-danger btn-sm" style="margin-top: 0.5rem">Từ chối
                                                </button>
                                            </form>
                                        @endif
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
