@extends('adminlte::page')

@section('title', 'Detalle de Nómina')

@section('content_header')
    <h1>Detalle de Nómina</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $nomina->id }}</p>
            <p><strong>Usuario:</strong> {{ $nomina->usuario->name }}</p>
            <p><strong>Horas Trabajadas:</strong> {{ $nomina->horas_trabajadas }}</p>
            <p><strong>Valor de la Hora:</strong> {{ $nomina->valor_hora }}</p>
            <p><strong>Total:</strong> {{ $nomina->horas_trabajadas * $nomina->valor_hora }}</p>
        </div>
    </div>
@stop
