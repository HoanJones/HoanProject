@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Danh sách nhạc cụ</h4>
                    <a class=" btn btn-primary" href="{{ route('flute-borrowing.borrow-list') }}">Nhạc cụ đang thuê</a>
                    <div class="tab-content">
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Loại nhạc cụ</th>
                                <th>Tên nhạc cụ</th>
                                <th>Chủ sở hữu</th>
                                <th>Trạng thái</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($data as $k => $flute)
                                @if($flute->status != 2)
                                    <tr>
                                        <td>{{ $flute->id }}</td>
                                        <td>{{ $flute->instrument_type_name }}</td>
                                        <td>{{ $flute->instrument_name }}</td>
                                        <td>{{ $flute->user_name }}</td>
                                        <td>{{ \App\Enums\User\InstrumentStatusEnum::getKeyByValue($flute->status) }}</td>
                                        <td>
                                            @if($flute->status != 0)
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('flute-borrowing.borrow',$flute->id) }}"> Mượn</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
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
