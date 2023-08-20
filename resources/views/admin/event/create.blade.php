@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thêm sự kiện</h4>
                    <div class="tab-content">
                        <form action="{{ route('event.store') }}" method="post">
                            @csrf
                            <div class="tab-pane show active" id="form-events">
                                <div class="form-group">
                                    <label for="event_name" class="col-form-label">Tên sự kiện</label>
                                    <input type="text" class="form-control" name="event_name"
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
                                    <label for="event_address" class="col-form-label">Địa điểm</label>
                                    <input type="text" class="form-control" name="event_address"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="member_quantity" class="col-form-label">Số lượng thành viên dự kiến</label>
                                    <input type="text" class="form-control" name="member_quantity"
                                           value="">
                                </div>
                                <button href="{{ route('event.store') }}" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

