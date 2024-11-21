<div class="container my-5">
    <!-- Panel de Control Header -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">
                {{ $esVistaCliente ? 'Mis Reseñas' : 'Panel - Reseñas de Clientes' }}
            </h1>
        </div>
    </div>

    <!-- Mensajes de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Botón para abrir modal (solo para clientes) -->
    @if ($esVistaCliente)
        <button class="btn btn-primary my-3" wire:click="abrirCreateModal">Realizar Reseña</button>
        <div>Estado del modal: {{ var_export($isCreateModalOpen) }}</div>
    @endif

    <!-- Modal para Registrar Reseña -->
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

    <!-- Tabla de Reseñas -->
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        @unless($esVistaCliente)
                            <th>Cliente</th>
                        @endunless
                        <th>Fecha</th>
                        <th>Calificación</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr>
                            @unless($esVistaCliente)
                                <td>{{ $feedback->id_usuario }}</td>
                            @endunless
                            <td>{{ $feedback->created_at->format('d/m/Y') }}</td>
                            <td>
                                @for($i = 0; $i < $feedback->calificacion; $i++)
                                    ⭐
                                @endfor
                            </td>
                            <td>{{ $feedback->comentario }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>