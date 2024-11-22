<div class="container my-4">
    <!-- Panel de Control Header -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Panel - Mesas</h1>
        </div>
    </div>

    <button class="btn btn-primary my-3" wire:click="abrirCreateModal">Registrar Mesa</button>

    <!-- Mensajes de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Filtros de Búsqueda -->
    <div class="row mb-4">
        <div class="col-md-6 mb-2">
            <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar por número de mesa...">
        </div>
    </div>

    <!-- Tabla de Mesas -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Número de Mesa</th>
                <th>Cantidad de Asientos</th>
                <th>Disponibilidad</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->numero_mesas }}</td>
                    <td>{{ $mesa->cantidad_asientos }}</td>
                    <td>
                        <span class="badge {{ $mesa->disponibilidad === 'Disponible' ? 'bg-success' : 'bg-danger' }}">
                            {{ $mesa->disponibilidad }}
                        </span>
                    </td>
                    <td>{{ $mesa->comentarios }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" wire:click="abrirEditModal({{ $mesa->numero_mesas }})">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $mesa->numero_mesas }})"
                                onclick="return confirm('¿Estás seguro de eliminar esta mesa?')">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal para Editar Mesa -->
    @if($isEditModalOpen)
        <div class="modal fade show d-block" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Mesa {{ $numero_mesas }}</h5>
                        <button type="button" class="btn-close" wire:click="cerrarEditModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
                                <input type="number" class="form-control" wire:model="cantidad_asientos" min="1">
                                @error('cantidad_asientos') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="disponibilidad" class="form-label">Disponibilidad</label>
                                <select class="form-control" wire:model="disponibilidad">
                                    <option value="Disponible">Disponible</option>
                                    <option value="No Disponible">No Disponible</option>
                                </select>
                                @error('disponibilidad') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentario</label>
                                <textarea class="form-control" wire:model="comentario"></textarea>
                                @error('comentario') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cerrarEditModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="update">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif

    <!-- Modal para Registrar Mesa -->
    @if($isCreateModalOpen)
        <div class="modal fade show d-block" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Mesa</h5>
                        <button type="button" class="btn-close" wire:click="cerrarCreateModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="store">
                            <div class="mb-3">
                                <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
                                <input type="number" class="form-control" wire:model="cantidad_asientos" min="1">
                                @error('cantidad_asientos') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentario</label>
                                <textarea class="form-control" wire:model="comentario"></textarea>
                                @error('comentario') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cerrarCreateModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="store">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush