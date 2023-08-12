@extends('layout_admin.main')
@section('content')
@if (session()->has('error'))
<script>
 Swal.fire(
     'Fail !',
    '{{session()->get('error')}}',
      'error'
 )
</script>
@endif
    <div class="container">
        <div class="pull-left">
            <h1>Sửa Role</h1>
        </div>
    </div>
    </br>
<div class="card">
<div class="card-body">
    <form action="{{ route('roles.update', $role->id) }}" method="post">
        @METHOD('PATCH')
        @csrf


        <div class="container">
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Name:</label>
                <span >{{ $role->name }}</span>
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
                    <label>
                        <input type="checkbox" value='{{ $value->id }}' name='permission[]'
                            {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>{{ $value->name }}
                    </label>
                    <br />
                @endforeach
            </div>
        </div></br>
        <div class="container">
            <button class="btn btn-success"> Lưu</button>
        </div>
    </form>
</div>
</div>
@endsection
