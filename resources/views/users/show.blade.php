@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Usuario</h3>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            @if ($user->roles2)
                <p><strong>Rol:</strong> {{ $user->roles2->name }}</p>
            @else
                <p><strong>Rol:</strong> Sin rol asignado</p>
            @endif
        </div>
    </div>
@endsection