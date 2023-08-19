@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Video</h4>
                    <div class="tab-content">
                        @can('video-create')
                            <a class="btn btn-success" href="{{ route('video.create') }}"> Tạo Video mới</a>
                        @endcan
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Link</th>
                                <th>Người đăng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($data as $key => $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->link }}</td>
                                    <td>{{ $video->user_id }}</td>
                                    <td>
                                        @can('video-update')
                                            <a class="btn btn-info btn-sm mr-2"
                                               href="{{ route('video.edit', $video->id) }}">Sửa</a>
                                        @endcan
                                        @can('video-delete')
                                            <form action="{{route('video.destroy', $video->id)}}" method='POST'>
                                                @csrf
                                                @METHOD('DELETE')
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                        class="btn btn-danger btn-sm" style="margin-top: 0.5rem">Xóa
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
