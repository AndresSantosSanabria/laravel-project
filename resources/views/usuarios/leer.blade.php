@extends('layout.app') 
@section('content')

<div class="container mt-4">

    <!-- Título principal -->
    <h1 class="mb-4 text-center">📋 Listado de Usuarios</h1>

    <!-- Mensaje de éxito al realizar una acción (crear, actualizar, eliminar) -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Éxito:</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Contenedor principal con estilo de tarjeta -->
    <div class="card shadow-sm">
        <div class="card-body">
            
            <!-- Tabla responsive para mostrar usuarios -->
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    
                    <!-- Cabecera de la tabla -->
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fecha de registro</th>
                            <th scope="col">Fecha de modificación</th>
                            <th scope="col" colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        @forelse($usuarios as $usuario)
                            <tr>
                                <!-- Datos del usuario -->
                                <td>{{ $usuario->nombres }}</td>
                                <td>{{ $usuario->apellidos }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->fechaRegistro }}</td>
                                <td>{{ $usuario->fechaModificacion }}</td>
                                
                                <!-- Botón de modificar (abre modal) -->
                                <td>
                                    <button type="button" 
                                            class="btn btn-primary" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalActualizar{{$usuario->id}}">
                                        ✏️ Modificar
                                    </button>
                                    <!-- Incluyo el modal de actualización -->
                                    @include('usuarios.actualizar')
                                </td>
                                
                                <!-- Botón de eliminar (abre modal) -->
                                <td>
                                    <button type="button" 
                                            class="btn btn-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEliminar{{$usuario->id}}">
                                        🗑️ Eliminar
                                    </button>
                                    <!-- Incluyo el modal de eliminación -->
                                    @include('usuarios.eliminar')
                                </td>
                            </tr>
                        @empty
                            <!-- Caso cuando no hay usuarios -->
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    No hay usuarios registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
