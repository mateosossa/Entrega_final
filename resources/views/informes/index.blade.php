@extends('adminlte::page')

@section('title', 'Informes')

@section('content_header')
    <h1>Informes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{ route('informes.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por ID de nómina o nombre de usuario" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Informes</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID Nómina</th>
                                <th>ID Usuario</th>
                                <th>Nombre de Usuario</th>
                                <th>Fecha de Realización</th>
                                <th>Monto de la Nómina</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($informes as $informe)
                                <tr>
                                    <td>{{ $informe->nomina_id }}</td>
                                    <td>{{ $informe->user_id }}</td>
                                    <td>{{ $informe->nombre_usuario }}</td>
                                    <td>{{ $informe->fecha_realizacion }}</td>
                                    <td>{{ $informe->monto_nomina }}</td>
                                    <td>
                                        <a href="{{ route('informes.show', $informe) }}" class="btn btn-sm btn-info">editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No se encontraron informes</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $informes->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
