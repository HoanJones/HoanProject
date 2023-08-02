@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin tài khoản</h4>
                    <form method="post" action="{{route('home.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{$name}}">
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="col-form-label">Ngày tháng năm sinh</label>
                            <input type="text" class="form-control" id="birthdate" name="birthday"
                                   value="{{$birthday}}">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="col-form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="inputAddress2"
                                   value="{{$email}}">
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-form-label">Giới tính</label>
                            <input type="text" class="form-control" id="gender" name="sex"
                                   value="{{$sex}}">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2" class="col-form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress2" name="address"
                                   value="{{$address}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone_number" class="col-form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" name="sdt" id="phone_number"
                                   value="{{$phone_number}}">
                        </div>
                        <div class="form-group">
                                <label for="job" class="col-form-label">Nghề nghiệp</label>
                                <input type="text" class="form-control" readonly id="job"
                                       value="{{$job}}">
                            </div>
                            <div class="form-group">
                                <label for="place" class="col-form-label">Nơi làm việc</label>
                                <input type="text" class="form-control" readonly id="place"
                                       value="{{$work_place}}">
                            </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
