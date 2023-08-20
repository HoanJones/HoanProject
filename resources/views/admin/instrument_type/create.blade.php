@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thêm loại nhạc cụ</h4>
                    <div class="tab-content">
                        <form action="{{ route('instrument_type.store') }}" method="post">
                            @csrf
                            <div class="tab-pane show active" id="form-instrument_type">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Tên loại nhạc cụ</label>
                                    <input type="text" class="form-control" name="name"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Mô tả</label>
                                    <input type="text" class="form-control" name="description"
                                           value="">
                                </div>
                                <button href="{{ route('instrument_type.store') }}" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

