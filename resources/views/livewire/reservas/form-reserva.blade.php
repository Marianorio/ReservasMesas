<div>
    {{-- Paso 1: Información básica --}}
    @if($paso === 1)
    <div class="step-1">
        <h4>Paso 1: Información de la Reserva</h4>
        
        <div class="mb-3">
            <label for="cant_personas" class="form-label">Cantidad de Personas</label>
            <input type="number" class="form-control" id="cantidad_asientos" wire:model="cantidad_asientos" min="1" max="10">
            @error('cantidad') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="mesa_id" class="form-label">Mesa</label>
            <select class="form-control" id="numero_mesa" wire:model="numero_mesa">
                <option value="">Seleccionar Mesa</option>
                @foreach(App\Models\Mesa::all() as $mesa)
                    <option value="{{ $mesa->numero_mesas }}">{{ $mesa->numero_mesas }}</option>
                @endforeach
            </select>
            @error('mesa_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="id_usuario" class="form-label">Usuario</label>
            <select class="form-control" id="id_usuario" wire:model="id_usuario">
                <option value="">Seleccionar Usuario</option>
                @foreach(App\Models\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-primary" wire:click="siguientePaso">Siguiente</button>
    </div>
    @endif

    {{-- Paso 2: Selector de Fecha y Hora --}}
    @if($paso === 2)
    <div class="step-2">
        <h4>Paso 2: Selección de Fecha y Hora</h4>
        
        <div class="mb-3">
            <label for="fecha_hora" class="form-label">Seleccione Fecha y Hora</label>
            <input type="text" class="form-control" id="fecha_hora" wire:model="fecha_hora" placeholder="Seleccione fecha y hora">
            @error('fecha_hora') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-between mt-3">
            <button type="button" class="btn btn-secondary" wire:click="pasoAnterior">Anterior</button>
            <button type="submit" class="btn btn-success">Confirmar Reserva</button>
        </div>
    </div>

    
    @endif
</div>


    