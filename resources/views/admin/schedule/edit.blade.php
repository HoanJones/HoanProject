@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin hoạt động</h4>
                    <div class="tab-content">
                        <form action="{{ route('schedule.update', $data) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            </div class="tab-pane show active" id="form-schedules">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputId" class="col-form-label">ID</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="schedule_name" class="col-form-label">Tên hoạt động</label>
                                        <input type="text" class="form-control" name="schedule_name"
                                               value="{{$data->schedule_name}}">
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
                                    <input type="text" class="form-control" name="place"
                                           value="{{$data->place}}">
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Trạng thái</label>
                                    <input type="text" class="form-control" name="status"
                                           value="{{$data->status}}">
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

