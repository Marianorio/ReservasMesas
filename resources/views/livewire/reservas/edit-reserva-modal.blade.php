<div class="modal fade show" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Reserva</h5>
                <button type="button" wire:click="cerrarEditModal" class="btn-close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <!-- Campos del formulario -->
                    @include('livewire.reservas.form-reserva')
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
