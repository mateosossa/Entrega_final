@extends('adminlte::page')

@section('title', 'Nóminas')

@section('content_header')
    <h1>Nóminas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Nóminas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nominas as $nomina)
                                <tr>
                                    <td>{{ $nomina->id }}</td>
                                    <td>{{ $nomina->usuario->name }}</td>
                                    <td>{{ $nomina->created_at }}</td>
                                    <td>{{ $nomina->monto }}</td>
                                    <td>
                                        <a href="{{ route('nominas.show', $nomina->id) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('nominas.edit', $nomina->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="{{ route('nominas.destroy', $nomina->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@stop
