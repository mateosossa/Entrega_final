@extends('adminlte::page')

@section('title', 'Editar Informe')

@section('content_header')
    <h1>Editar Informe</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('informes.update', $informe) }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nomina_id">ID Nómina</label>
                    <input type="text" name="nomina_id" class="form-control" value="{{ $informe->nomina_id }}" readonly>
                </div>

                <div class="form-group">
                    <label for="user_id">ID Usuario</label>
                    <input type="text" name="user_id" class="form-control" value="{{ $informe->user_id }}" readonly>
                </div>

                <div class="form-group">
                    <label for="nombre_usuario">Nombre de Usuario</label>
                    <input type="text" name="nombre_usuario" class="form-control" value="{{ $informe->nombre_usuario }}" readonly>
                </div>

                <div class="form-group">
                    <label for="fecha_realizacion">Fecha de Realización</label>
                    <input type="text" name="fecha_realizacion" class="form-control" value="{{ $informe->fecha_realizacion }}" readonly>
                </div>

                <div class="form-group">
                    <label for="monto_nomina">Monto de la Nómina</label>
                    <input type="text" name="monto_nomina" class="form-control" value="{{ $informe->monto_nomina }}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@stop
