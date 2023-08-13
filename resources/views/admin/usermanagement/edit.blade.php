@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin tài khoản người dùng</h4>
                    <div class="tab-content">
                        <form action="{{ route('usermanagement.update', $data) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            <div class="tab-pane show active" id="form-users">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputId" class="col-form-label">ID</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1" class="col-form-label">Role</label>
                                        <select name="roles[]" id="" class="form-control select2" data-toggle="select2">
                                            @foreach ($roles as $value)
                                                <option value="{{ $value->id }}"
                                                        @if($data->role === $value->id) selected @endif>
                                                    {{getUserRoleByKey($value->id)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="col-form-label">Họ và tên</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{$data->name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gender" class="col-form-label">Giới tính</label>
                                        <select class="form-control select2" data-toggle="select2" name="gender">
                                            <option value="0" @if($data->gender === 0) selected @endif>Nam</option>
                                            <option value="1" @if($data->gender === 1) selected @endif>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="text" class="form-control" name="password"
                                           value="">
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

