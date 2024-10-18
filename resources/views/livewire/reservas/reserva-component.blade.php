<div>
    <button wire:click="abrirCreateModal" class="btn btn-primary">Nueva Reserva</button>

    @if($isCreateModalOpen)
        @include('livewire.reservas.create-reserva-modal')
    @endif

    @if($isEditModalOpen)
        @include('livewire.reservas.edit-reserva-modal')
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Código Verificación</th>
                <th>Fecha</th>
                <th>Hora</th>
                {{-- <th>Mesa</th>
                <th>Usuario</th>
                <th>Estado</th> --}}
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->ccodigo_verificacion }}</td>
                    <td>{{ $reserva->dfecha }}</td>
                    <td>{{ $reserva->dhora }}</td>
                  {{--   <td>{{ $reserva->mesa->numero_mesas }}</td>
                    <td>{{ $reserva->user->name }}</td>
                    <td>{{ $reserva->estado }}</td> --}}
                    <td>
                        <button wire:click="abrirEditModal({{ $reserva->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="delete({{ $reserva->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
