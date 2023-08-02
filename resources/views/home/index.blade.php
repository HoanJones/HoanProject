@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin tài khoản người dùng</h4>
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#form-users" data-toggle="tab" aria-expanded="false"
                               class="nav-link active">
                                Tài khoản
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#form-executive_boards" data-toggle="tab" aria-expanded="false"
                               class="nav-link active">
                                Ban điều hành
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#form-members" data-toggle="tab" aria-expanded="false"
                               class="nav-link active">
                                Thêm Nhạc cụ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#form-members" data-toggle="tab" aria-expanded="false"
                               class="nav-link active">
                                Tạo Sự siện
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="form-users">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputId" class="col-form-label">ID</label>
                                    <input type="text" readonly class="form-control" id="inputId" value="{{$id}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="role" class="col-form-label">Vai trò</label>
                                    <input type="text" class="form-control" readonly id="role" value="{{$role}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Họ và tên</label>
                                <input type="text" class="form-control" readonly id="name"
                                       value="{{$name}}">
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="col-form-label">Ngày tháng năm sinh</label>
                                <input type="text" class="form-control" readonly id="birthdate"
                                       value="{{$birthday}}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Email</label>
                                <input type="text" class="form-control" readonly id="inputAddress2"
                                       value="{{$email}}">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-form-label">Giới tính</label>
                                <input type="text" class="form-control" readonly id="gender"
                                       value="{{$sex}}">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Địa chỉ</label>
                                <input type="text" class="form-control" readonly id="inputAddress2"
                                       value="{{$address}}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-form-label">Số Điện Thoại</label>
                                <input type="text" class="form-control" readonly id="phone_numer"
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
                            <a href="{{route('home.user_edit')}}" class="btn btn-primary">Sửa</a>
                        </div>
                        {{--
                        <div class="tab-pane show active" id="form-executive_boards">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputId" class="col-form-label">ID Ban điều hành</label>
                                    <input type="text" readonly class="form-control" id="inputId" value="{{$id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-form-label">Trình độ</label>
                                <input type="text" class="form-control" readonly id="level"
                                       value="{{$level}}">
                            </div>
                            <div class="form-group">
                                <label for="forte" class="col-form-label">Sở trường</label>
                                <input type="text" class="form-control" readonly id="forte"
                                       value="{{$forte}}">
                            </div>
                            <div class="form-group">
                                <label for="term" class="col-form-label">Nhiệm kỳ</label>
                                <input type="text" class="form-control" readonly id="term"
                                       value="{{$term}}">
                            </div>
                            <a href="{{route('home.admin_edit')}}" class="btn btn-primary">Sửa</a>
                        
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
