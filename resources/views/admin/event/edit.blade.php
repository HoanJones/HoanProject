@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin sự kiện</h4>
                    <div class="tab-content">
                        <form action="{{ route('event.update', $data) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            </div class="tab-pane show active" id="form-events">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputId" class="col-form-label">ID</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="event_name" class="col-form-label">Tên sự kiện</label>
                                        <input type="text" class="form-control" name="event_name"
                                               value="{{$data->event_name}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="start_time" class="col-form-label">Thời gian bắt đầu</label>
                                        <input type="text" class="form-control" name="start_time"
                                               value="{{ $data->start_time }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="end_time" class="col-form-label">Thời gian kết thúc</label>
                                        <input type="text" class="form-control" name="end_time"
                                               value="{{ $data->end_time }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Địa điểm</label>
                                    <input type="text" class="form-control" name="event_address"
                                           value="{{$data->event_address}}">
                                </div>
                                <div class="form-group">
                                    <label for="member_quantity" class="col-form-label">Số lượng thành viên dự kiến tham gia</label>
                                    <input type="text" class="form-control" name="member_quantity"
                                           value="{{$data->member_quantity}}">
                                </div>
                                <button class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

