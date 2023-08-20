@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin sheet</h4>
                    <div class="tab-content">
                        <form action="{{ route('sheet.update', $data->id) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            </div class="tab-pane show active" id="form-sheets">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputId" class="col-form-label">ID Sheet - Cảm âm</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="name" class="col-form-label">Tên Sheet - Cảm âm</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{$data->name}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="gender" class="col-form-label">Người đăng tải</label>
                                        <select class="form-control select2" data-toggle="select2" name="user_id">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" @if ($user->id == $data->user_id)
                                                    selected
                                                @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="sheet_image" class="col-form-label">Đường dẫn</label>
                                        <input type="text" class="form-control" name="sheet_image"
                                               value="{{ $data->sheet_image }}">
                                    </div>
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

