@extends('layout_admin.main')


@section('content')
    <div class="container">
        <div class="pull-left">
            <h1>Create New Role</h1>
        </div>
    </div>

    <form action="{{ route('roles.store') }}" method='post'>
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
                <br />
                @foreach ($permission as $value)
                    <input type="checkbox" name="permission[]" value='{{ $value->id }}'> {{ $value->name }}

                    <br />
                @endforeach
            </div>
        </div>
        <div class="container">
            <button class='btn btn-success'>Submit</button>

        </div>
    </form>
@endsection
