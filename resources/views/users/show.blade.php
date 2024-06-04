@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Usuario</h3>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            @if ($user->role)
                <p><strong>Rol:</strong> {{ $user->role->name }}</p>
            @else
                <p><strong>Rol:</strong> Sin rol asignado</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection
