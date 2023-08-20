@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thêm hoạt động</h4>
                    <div class="tab-content">
                        <form action="{{ route('schedule.store') }}" method="post">
                            @csrf
                            <div class="tab-pane show active" id="form-events">
                                <div class="form-group">
                                    <label for="schedule_name" class="col-form-label">Tên hoạt động</label>
                                    <input type="text" class="form-control" name="schedule_name"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="start_time" class="col-form-label">Thời gian bắt đầu</label>
                                    <input type="text" class="form-control" name="start_time"
                                           value="">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="end_time" class="col-form-label">Thời gian kết thúc</label>
                                    <input type="text" class="form-control" name="end_time"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="place" class="col-form-label">Địa điểm</label>
                                    <input type="text" class="form-control" name="place"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Số lượng thành viên dự kiến</label>
                                    <input type="text" class="form-control" name="status"
                                           value="">
                                </div>
                                <button href="{{ route('schedule.store') }}" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

