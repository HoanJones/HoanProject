@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Quản lý role</h4>
                    <div class="tab-content">
                        <form action="{{ route('role.update', $role->id) }}" method="post">
                            @METHOD('PATCH')
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                                    <span>{{ $role->name }}</span>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="container">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Permission:</label>
                                    <br/>
                                    @foreach ($permission as $value)
                                        <label>
                                            <input type="checkbox" value='{{ $value->id }}' name='permission[]'
                                                {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>{{ $value->name }}
                                        </label>
                                        <br/>
                                    @endforeach
                                </div>
                            </div>
                            </br>
                            <div class="container">
                                <button class="btn btn-success"> Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
