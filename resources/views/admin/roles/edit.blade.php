@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Role</h1>
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="permissions">Assign Permissions</label>
                        <select name="permissions[]" class="form-control" multiple required>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
