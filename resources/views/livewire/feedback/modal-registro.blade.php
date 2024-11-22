<!-- Modal para Crear Reseña -->
@if($isCreateModalOpen)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Reseña</h5>
                        <button type="button" class="btn-close" wire:click="cerrarCreateModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="store">
                            <div class="mb-3">
                                <label for="calificacion" class="form-label">Calificación</label>
                                <select wire:model.live="calificacion" class="form-select">
                                    <option value="">Seleccione una calificación</option>
                                    <option value="1">1 Estrella</option>
                                    <option value="2">2 Estrellas</option>
                                    <option value="3">3 Estrellas</option>
                                    <option value="4">4 Estrellas</option>
                                    <option value="5">5 Estrellas</option>
                                </select>
                                @error('calificacion') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentario</label>
                                <textarea class="form-control" wire:model.live="comentario" rows="4"></textarea>
                                @error('comentario') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cerrarCreateModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="store">Enviar Reseña</button>
                    </div>
                </div>
            </div>
        </div>
    @endif