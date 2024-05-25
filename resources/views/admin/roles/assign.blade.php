@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h1>Asignar Roles a Usuario</h1>
                <form action="{{ route('roles.assign') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">Seleccionar Usuario</label>
                        <select name="user_id" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roles">Seleccionar Roles</label>
                        <select name="roles[]" class="form-control" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Asignar Roles</button>
                </form>
            </div>
        </div>
    </div>
@endsection
