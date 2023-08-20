@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin loại nhạc cụ</h4>
                    <div class="tab-content">
                        <form action="{{ route('instrument_type.update', $data) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            </div class="tab-pane show active" id="form-events">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputId" class="col-form-label">ID</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $instrument_type->id }}">
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label for="name" class="col-form-label">Tên loại nhạc cụ</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{$data->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Mô tả</label>
                                    <input type="text" class="form-control" name="description"
                                           value="{{$data->description}}">
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

