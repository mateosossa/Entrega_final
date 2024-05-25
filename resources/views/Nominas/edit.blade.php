@extends('adminlte::page')

@section('title', 'Editar Nómina')

@section('content_header')
    <h1>Editar Nómina</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('nominas.update', $nomina->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="horas_trabajadas">Horas Trabajadas</label>
                    <input type="number" name="horas_trabajadas" class="form-control" value="{{ $nomina->horas_trabajadas }}">
                </div>
                <div class="form-group">
                    <label for="valor_hora">Valor de la Hora</label>
                    <input type="number" name="valor_hora" class="form-control" value="{{ $nomina->valor_hora }}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Nómina</button>
            </form>
        </div>
    </div>
@stop
