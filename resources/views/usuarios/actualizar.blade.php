<!-- Modal para actualizar usuario -->
<div class="modal fade" id="modalActualizar{{$usuario->id}}" tabindex="-1" aria-labelledby="modalLabel{{$usuario->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- Centrar modal -->
        <div class="modal-content rounded-4 shadow-lg border-0">
            
            <!-- Formulario de actualización -->
            <form method="POST" action="{{ route('usuarios.actualizar', $usuario) }}">
                @csrf
                @method('PUT')
                
                <!-- Encabezado -->
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-bold" id="modalLabel{{$usuario->id}}">
                        <i class="bi bi-pencil-square me-2"></i> Actualizar usuario
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Cuerpo -->
                <div class="modal-body">
                    
                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="nombres{{$usuario->id}}" class="form-label fw-semibold">Nombre</label>
                        <input type="text" id="nombres{{$usuario->id}}" name="nombres" 
                               value="{{ $usuario->nombres }}" 
                               class="form-control @error('nombres') is-invalid @enderror" required>
                        @error('nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Campo Apellidos -->
                    <div class="mb-3">
                        <label for="apellidos{{$usuario->id}}" class="form-label fw-semibold">Apellidos</label>
                        <input type="text" id="apellidos{{$usuario->id}}" name="apellidos" 
                               value="{{ $usuario->apellidos }}" 
                               class="form-control @error('apellidos') is-invalid @enderror" required>
                        @error('apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Campo Teléfono -->
                    <div class="mb-3">
                        <label for="telefono{{$usuario->id}}" class="form-label fw-semibold">Teléfono</label>
                        <input type="number" id="telefono{{$usuario->id}}" name="telefono" 
                               value="{{ $usuario->telefono }}" 
                               class="form-control @error('telefono') is-invalid @enderror" required
                               oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);">
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Máximo 10 dígitos</small>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="modal-footer bg-light rounded-bottom-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Actualizar
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
