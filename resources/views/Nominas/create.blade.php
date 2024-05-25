@extends('adminlte::page')

@section('title', 'Crear Nómina')

@section('content_header')
    <h1>Crear Nómina</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('nominas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <select name="usuario" id="usuario" class="form-control">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Campo de solo lectura para mostrar el ID del usuario -->
                        <div class="form-group">
                            <label for="usuario_id">ID de Usuario</label>
                            <input type="text" name="usuario_id" id="usuario_id" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="horas_trabajadas">Horas Trabajadas</label>
                            <input type="number" name="horas_trabajadas" id="horas_trabajadas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="valor_hora">Valor de la Hora</label>
                            <input type="number" name="valor_hora" id="valor_hora" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Nómina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        document.getElementById('usuario').addEventListener('change', function() {
            var selectedUserId = this.value;
            document.getElementById('usuario_id').value = selectedUserId;
        });
    </script>
@endpush
