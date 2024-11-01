<div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button wire:click="abrirCreateModal" class="btn btn-primary">Nueva Reserva</button>

    @if ($isCreateModalOpen)
        @include('livewire.reservas.create-reserva-modal')
    @endif

    @if ($isEditModalOpen)
        @include('livewire.reservas.edit-reserva-modal')
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Código Verificación</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Mesa</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->nnumero_reserva }}</td>
                    <td>{{ $reserva->ccodigo_verificacion }}</td>
                    <td>{{ $reserva->dfecha }}</td>
                    <td>{{ $reserva->dhora }}</td>
                    <td>{{ $reserva->detalleReserva && $reserva->detalleReserva->mesa ? $reserva->detalleReserva->mesa->comentarios : 'Sin mesa' }}
                    </td>
                    <td>{{ $reserva->detalleReserva && $reserva->detalleReserva->user ? $reserva->detalleReserva->user->name : 'Sin usuario' }}
                    </td>
                    <td>{{ $reserva->estado }}</td>
                    <td>
                        <button wire:click="abrirEditModal({{ $reserva->nnumero_reserva }})" class="btn btn-warning">Editar</button>
                        <button wire:click="eliminar({{ $reserva->nnumero_reserva }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
