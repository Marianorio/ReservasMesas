<div class="modal fade show" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Reserva</h5>
                <button type="button" wire:click="cerrarCreateModal" class="btn-close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="insertar">
                    <!-- Campos del formulario -->
                    @include('livewire.reservas.form-reserva')
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
