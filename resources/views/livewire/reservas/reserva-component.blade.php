<div class="container my-4">
    <!-- Panel de Control Header -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Panel - Reservas</h1>
        </div>
    </div>

    <button wire:click="abrirCreateModal" class="btn btn-primary my-3">Nueva Reserva</button>

    <!-- Mensajes -->
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

    <!-- Tabla de Reservas -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
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
                    <td>{{ $reserva->detalleReserva && $reserva->detalleReserva->mesa ? $reserva->detalleReserva->mesa->comentarios : 'Sin mesa' }}</td>
                    <td>{{ $reserva->detalleReserva && $reserva->detalleReserva->user ? $reserva->detalleReserva->user->name : 'Sin usuario' }}</td>
                    <td>{{ $reserva->estado }}</td>
                    <td>
                        <button wire:click="abrirEditModal({{ $reserva->nnumero_reserva }})" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button wire:click="eliminar({{ $reserva->nnumero_reserva }})" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($isCreateModalOpen)
        @include('livewire.reservas.create-reserva-modal')
    @endif

    @if ($isEditModalOpen)
        @include('livewire.reservas.edit-reserva-modal')
    @endif
</div>

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush