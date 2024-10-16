<div class="container my-4">
    <!-- Panel de Control Header -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Panel - Mesas</h1>
        </div>
    </div>

    <button class="btn btn-primary my-3" wire:click="abrirModal">Registrar Mesa</button>

    <!-- Mensajes de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Filtros de Búsqueda -->
    <div class="row mb-4">
        <div class="col-md-6 mb-2">
            <input type="text" id="inputBusqueda" class="form-control" placeholder="Buscar por número de mesa...">
        </div>
        <div class="col-md-6 mb-2">
            <select id="filtroDisponibilidad" class="form-select">
                <option value="">Filtrar por Disponibilidad</option>
                <option value="disponible">Disponible</option>
                <option value="ocupada">Ocupada</option>
                <option value="reservada">Reservada</option>
            </select>
        </div>
    </div>

    <!-- Tabla de Mesas -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Número de Mesa</th>
                <th>Cantidad de Asientos</th>
                <th>Disponibilidad</th>
                <th>Reservas Activas</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->id }}</td>
                    <td>{{ $mesa->numero_mesas }}</td>
                    <td>{{ $mesa->cantidad_asientos }}</td>
                    <td>{{ $mesa->disponibilidad }}</td>
                    <td>{{ $mesa->reservas_activas }}</td>
                    <td>{{ $mesa->comentarios }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $mesa->id }}">Editar</button>
                        <button class="btn btn-danger" wire:click="delete({{ $mesa->id }})">Eliminar</button>
                    </td>
                </tr>

                <!-- Modal para Editar Mesa -->
                <div class="modal fade" id="modalEditar{{ $mesa->id }}" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditarLabel">Editar Mesa {{ $mesa->numero_mesas }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="numero_mesas" class="form-label">Número de Mesa</label>
                                        <input type="text" class="form-control" wire:model="numero_mesas" value="{{ $mesa->numero_mesas }}">
                                        @error('numero_mesas') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
                                        <input type="number" class="form-control" wire:model="cantidad_asientos" value="{{ $mesa->cantidad_asientos }}">
                                        @error('cantidad_asientos') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="disponibilidad" class="form-label">Disponibilidad</label>
                                        <select class="form-select" wire:model="disponibilidad">
                                            <option value="disponible" {{ $mesa->disponibilidad == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                            <option value="ocupada" {{ $mesa->disponibilidad == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
                                            <option value="reservada" {{ $mesa->disponibilidad == 'reservada' ? 'selected' : '' }}>Reservada</option>
                                        </select>
                                        @error('disponibilidad') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="comentarios" class="form-label">Comentarios</label>
                                        <textarea class="form-control" wire:model="comentarios">{{ $mesa->comentarios }}</textarea>
                                        @error('comentarios') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" wire:click="update({{ $mesa->id }})">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal para Registrar Mesa -->
    @if($isModalOpen)
        <div class="modal fade show d-block" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Mesa</h5>
                        <button type="button" class="btn-close" wire:click="cerrarModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="numero_mesas" class="form-label">Número de Mesa</label>
                                <input type="text" class="form-control" wire:model="numero_mesas">
                                @error('numero_mesas') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
                                <input type="number" class="form-control" wire:model="cantidad_asientos">
                                @error('cantidad_asientos') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="disponibilidad" class="form-label">Disponibilidad</label>
                                <select class="form-select" wire:model="disponibilidad">
                                    <option value="disponible">Disponible</option>
                                    <option value="ocupada">Ocupada</option>
                                    <option value="reservada">Reservada</option>
                                </select>
                                @error('disponibilidad') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="comentarios" class="form-label">Comentarios</label>
                                <textarea class="form-control" wire:model="comentarios"></textarea>
                                @error('comentarios') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cerrarModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="store">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
