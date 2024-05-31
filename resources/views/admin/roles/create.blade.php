@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Role</h1>
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="permissions">Assign Permissions</label>
                        <div>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
                                    <label class="form-check-label" for="permission{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
