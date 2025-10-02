<!-- Modal de confirmación para eliminar usuario -->
<div class="modal fade" id="modalEliminar{{$usuario->id}}" tabindex="-1" aria-labelledby="modalEliminarLabel{{$usuario->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- Centrado en pantalla -->
        <div class="modal-content rounded-4 shadow-lg border-0">
            
            <!-- Formulario que envía la petición DELETE -->
            <form method="POST" action="{{ route('usuarios.eliminar', $usuario->id) }}">
                @csrf
                @method('DELETE')
                
                <!-- Encabezado del modal -->
                <div class="modal-header bg-danger text-white rounded-top-4">
                    <h5 class="modal-title fw-bold" id="modalEliminarLabel{{$usuario->id}}">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Eliminar Usuario
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <!-- Mensaje de advertencia con nombre del usuario -->
                    <p>¿Está seguro que desea eliminar al usuario 
                       <strong>{{ $usuario->nombres }} {{ $usuario->apellidos }}</strong>?</p>
                    <p class="text-muted small mb-0">
                        ⚠️ Esta acción no se puede deshacer.
                    </p>
                </div>
                
                <!-- Footer con botones de acción -->
                <div class="modal-footer bg-light rounded-bottom-4">
                    <!-- Botón para cerrar sin eliminar -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancelar
                    </button>
                    <!-- Botón de confirmación para eliminar -->
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3-fill me-1"></i> Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
