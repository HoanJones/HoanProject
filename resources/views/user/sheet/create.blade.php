@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thêm Sheet - Cảm âm mới</h4>
                    <div class="tab-content">
                        <form action="{{ route('sheet.store') }}" method="post">
                            @csrf
                            <div class="tab-pane show active" id="form-sheets">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Tên Sheet</label>
                                    <input type="text" class="form-control" name="name"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="sheet_image" class="col-form-label">Link ảnh sheet</label>
                                    <input type="text" class="form-control" name="sheet_image"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-form-label">Người đăng tải</label>
                                    <select class="form-control select2" data-toggle="select2" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button href="{{ route('sheet.store') }}" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection