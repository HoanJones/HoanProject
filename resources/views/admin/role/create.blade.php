@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Quản lý role</h4>
                    <div class="tab-content">
                        <form action="{{ route('role.store') }}" method='post'>
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                                    <input type="text" name='name' placeholder="Name"
                                           class="form-control @error('name') is-invalid  @enderror">
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
                                        <input type="checkbox" name="permission[]"
                                               value='{{ $value->id }}'> {{ $value->name }}
                                        <br/>
                                    @endforeach
                                </div>
                            </div>
                            <div class="container">
                                <button class='btn btn-success'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
