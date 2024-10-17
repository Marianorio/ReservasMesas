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
            <input type="text" id="inputBusqueda" class="form-control" placeholder="Buscar por número de mesa...">
        </div>
    </div>

    <!-- Tabla de Mesas -->
    <table class="table table-striped table-hover" id="tablaResenas">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Número de Mesa</th>
                <th>Cantidad de Asientos</th>
                <th>Disponibilidad</th>
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
                    <td>{{ $mesa->comentarios }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" wire:click="abrirEditModal({{ $mesa->id }})">Editar</button>
                        <button class="btn btn-danger" wire:click="delete({{ $mesa->id }})">Eliminar</button>
                    </td>
                </tr>

                <!-- Modal para Editar Mesa -->
                @if($isEditModalOpen)
                    <div class="modal fade show d-block" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Mesa</h5>
                                    <button type="button" class="btn-close" wire:click="cerrarEditModal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="numero_mesas" class="form-label">Número de Mesa</label>
                                            <input type="text" class="form-control" wire:model="numero">
                                            @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
                                            <input type="number" class="form-control" wire:model="capacidad">
                                            @error('capacidad') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="comentarios" class="form-label">Comentarios</label>
                                            <textarea class="form-control" wire:model="comentarios"></textarea>
                                            @error('comentarios') <span class="text-danger">{{ $message }}</span> @enderror
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

            @endforeach
        </tbody>
    </table>

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
                    <form>
                        <div class="mb-3">
                            <label for="numero_mesas" class="form-label">Número de Mesa</label>
                            <input type="text" class="form-control" wire:model="numero">
                            @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_asientos" class="form-label">Cantidad de Asientos</label>
                            <input type="number" class="form-control" wire:model="capacidad">
                            @error('capacidad') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios</label>
                            <textarea class="form-control" wire:model="comentarios"></textarea>
                            @error('comentarios') <span class="text-danger">{{ $message }}</span> @enderror
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


<script src="{{ asset('js/busquedaMesas.js') }}"></script>

