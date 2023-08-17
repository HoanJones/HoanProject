@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin tài khoản người dùng</h4>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="form-users">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputId" class="col-form-label">ID</label>
                                    <input type="text" readonly class="form-control" id="inputId"
                                           value="{{ $data->id }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="role" class="col-form-label">Vai trò</label>
                                    <input type="text" class="form-control" readonly id="role"
                                           value="{{getUserRoleByKey($data->role)}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Họ và tên</label>
                                <input type="text" class="form-control" readonly id="name"
                                       value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="col-form-label">Ngày tháng năm sinh</label>
                                <input type="text" class="form-control" readonly id="birthdate"
                                       value="{{ reformatDateToDMY($data->birthday) }}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Email</label>
                                <input type="text" class="form-control" readonly id="inputAddress2"
                                       value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-form-label">Giới tính</label>
                                <input type="text" class="form-control" readonly id="gender"
                                       value="{{ $data->gender == 0 ? 'Nam' : 'Nữ'}}">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Địa chỉ</label>
                                <input type="text" class="form-control" readonly id="inputAddress2"
                                       value="{{$data->address}}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-form-label">Số Điện Thoại</label>
                                <input type="text" class="form-control" readonly id="phone_numer"
                                       value="{{$data->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label for="job" class="col-form-label">Nghề nghiệp</label>
                                <input type="text" class="form-control" readonly id="job"
                                       value="{{$data->job}}">
                            </div>
                            <div class="form-group">
                                <label for="place" class="col-form-label">Nơi làm việc</label>
                                <input type="text" class="form-control" readonly id="place"
                                       value="{{$data->work_place}}">
                            </div>
                            <a href="{{ route('profile.edit', $data) }}" class="btn btn-primary">Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
