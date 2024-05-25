@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Roles</h1>
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Create New Role</a>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
