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

            @if ($isCreateModalOpen)
        @include('livewire.feedback.modal-registro')
    @endif
        </div>
    </div>
</div>