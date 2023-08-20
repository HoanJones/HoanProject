@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thêm video mới</h4>
                    <div class="tab-content">
                        <form action="{{ route('video.store') }}" method="post">
                            @csrf
                            <div class="tab-pane show active" id="form-videos">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Tên video</label>
                                    <input type="text" class="form-control" name="name"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-form-label">Người đăng</label>
                                    <select class="form-control select2" data-toggle="select2" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="link" class="col-form-label"> Đường dẫn video</label>
                                    <input type="text" class="form-control" name="link"
                                           value="">
                                </div>
                                </div>
                                <button href="{{ route('video.store') }}" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection