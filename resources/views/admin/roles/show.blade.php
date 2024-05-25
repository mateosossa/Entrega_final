@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detalles del Rol</h1>
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $role->name }}</p>
                        <p><strong>Acciones:</strong></p>
                        <ul>
                            @foreach ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
