@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="card">
    <div class="card-header">
        <h4>Crear Reserva</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('reservas.store') }}">
            @csrf

            <!-- Mesa ID (oculto) -->
            <input type="hidden" name="mesa_id" value="{{ $mesa->id }}">

            <div class="form-group">
                <label for="cantidad_asientos">Cantidad de Asientos</label>
                <input type="number" name="ncantidad_asientos" class="form-control" required>
            </div>

            <!-- Fecha de la Reserva -->
            <div class="mb-3">
                <label for="dfecha" class="form-label">Fecha de la Reserva</label>
                <input type="date" class="form-control" id="dfecha" name="dfecha" required>
            </div>

            <!-- Hora de la Reserva -->
            <div class="mb-3">
                <label for="dhora" class="form-label">Hora de la Reserva</label>
                <input type="time" class="form-control" id="dhora" name="dhora" required>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="btn btn-primary">Guardar Reserva</button>
        </form>
    </div>
</div>

@include('layouts.includes.footer')
