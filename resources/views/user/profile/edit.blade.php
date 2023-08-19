@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin tài khoản người dùng</h4>
                    <div class="tab-content">
                        <form action="{{ route('profile.update', ['profile' => $data->id]) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            <div class="tab-pane show active" id="form-users">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputId" class="col-form-label">ID</label>
                                        <input type="text" readonly class="form-control" id="inputId"
                                               value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="role" class="col-form-label">Vai trò</label>
                                        <input type="text" class="form-control" readonly id="role"
                                               value="{{getUserRoleByKey($data->role)}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="gender" class="col-form-label">Trạng thái hoạt động</label>
                                        <input type="text" class="form-control" readonly id="user_status"
                                               value="{{ \App\Enums\User\UserStatusEnum::getKeyByValue($data->user_status) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Họ và tên</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{$data->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="birthdate" class="col-form-label">Ngày tháng năm sinh</label>
                                    <input type="text" class="form-control" data-provide="datepicker"
                                           data-date-autoclose="true" data-date-format="dd-mm-yyyy"
                                           name="birthday" value="{{ reformatDateToDMY($data->birthday) }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                           value="{{$data->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-form-label">Giới tính</label>
                                    <select class="form-control select2" data-toggle="select2" name="gender">
                                        <option value="0" @if($data->gender === 0) selected @endif>Nam</option>
                                        <option value="1" @if($data->gender === 1) selected @endif>Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address"
                                           value="{{$data->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="col-form-label">Số Điện Thoại</label>
                                    <input type="text" class="form-control" name="phone_number"
                                           value="{{$data->phone_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="job" class="col-form-label">Nghề nghiệp</label>
                                    <input type="text" class="form-control" name="job"
                                           value="{{$data->job}}">
                                </div>
                                <div class="form-group">
                                    <label for="place" class="col-form-label">Nơi làm việc</label>
                                    <input type="text" class="form-control" name="work_place"
                                           value="{{$data->work_place}}">
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

