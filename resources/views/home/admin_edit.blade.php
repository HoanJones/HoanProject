@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Thông tin cá nhân Ban điều hành</h4>
                    <form method="post" action="{{route('home.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="level" class="col-form-label">Trình độ</label>
                            <input type="text" class="form-control" id="level" name="level"
                                   value="{{$level}}">
                        </div>
                        <div class="form-group">
                            <label for="forte" class="col-form-label">Sở trường</label>
                            <input type="text" class="form-control" id="forte" name="forte"
                                   value="{{$forte}}">
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="term" class="col-form-label">Nhiệm kỳ</label>
                            <input type="text" class="form-control" id="term" name="term"
                                   value="{{$term}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
