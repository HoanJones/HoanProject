@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Form</h4>
                    <div class="tab-content">
                        <form action="{{ route('flute-borrowing.borrowing', $data->id) }}" method="post">
                            @csrf
                            @METHOD('PUT')
                            <div class="tab-pane show active" id="form-users">
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                        <label for="inputId" class="col-form-label">ID</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputId" class="col-form-label">Loại nhạc cụ</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->instrument_type_name }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputId" class="col-form-label">Tên nhạc cụ</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->instrument_name }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputId" class="col-form-label">Chủ sở hữu</label>
                                        <input type="text" disabled readonly class="form-control" id="inputId"
                                               value="{{ $data->user_name }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="birthdate" class="col-form-label">Ngày mượn</label>
                                        <input type="text" class="form-control" data-provide="datepicker"
                                               data-date-autoclose="true" data-date-format="dd-mm-yyyy"
                                               name="borrowing_date" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="birthdate" class="col-form-label">Ngày trả</label>
                                        <input type="text" class="form-control" data-provide="datepicker"
                                               data-date-autoclose="true" data-date-format="dd-mm-yyyy"
                                               name="due_date" value="">
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
