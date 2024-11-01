<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" wire:model="dfecha">
    @error('fecha') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label for="hora" class="form-label">Hora</label>
    <input type="time" class="form-control" id="fecha" wire:model="dhora">
    @error('hora') <span class="text-danger">{{ $message }}</span> @enderror
</div>

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
