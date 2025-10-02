@extends('layout.app')
<!-- Extiendo del layout principal llamado "app" -->

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">

            <!-- Card que contiene el formulario -->
            <div class="card shadow-lg border-0 rounded-lg">

                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">➕ Añadir un Usuario</h4>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body p-4">

                    <!-- Formulario para guardar un usuario -->
                    <form action="{{ route('usuarios.guardar') }}" method="POST">
                        @csrf <!-- Token de seguridad -->

                        <!-- Campo: Nombre -->
                        <div class="form-group mb-3">
                            <label for="nombres" class="font-weight-bold">Nombre</label>
                            <input type="text" id="nombres" name="nombres" class="form-control"
                                placeholder="Ej: Juan" required>
                        </div>

                        <!-- Campo: Apellidos -->
                        <div class="form-group mb-3">
                            <label for="apellidos" class="font-weight-bold">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control"
                                placeholder="Ej: Pérez López" required>
                        </div>

                        <!-- Campo: Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Ej: perez.lopez@mail.com"
                                value="{{ old('email') }}"
                                required
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Validación extra con regex: solo correos válidos -->

                        <!-- Campo: Teléfono -->
                        <div class="form-group mb-4">
                            <label for="telefono" class="font-weight-bold">Teléfono</label>
                            <input type="number" id="telefono" name="telefono" class="form-control"
                                placeholder="Ej: 3001234567" maxlength="10" required
                                oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);">
                            <!-- Limita la cantidad máxima de dígitos a 10 -->
                        </div>

                        <!-- Botón de guardar -->
                        <button type="submit" class="btn btn-primary btn-block">
                            💾 Guardar Usuario
                        </button>
                    </form>

                    <!-- Alerta de éxito si se guarda correctamente -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>

                <!-- Footer de la tarjeta -->
                <div class="card-footer text-muted text-center">
                    <small>📌 Asegúrate de llenar todos los campos antes de guardar</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection