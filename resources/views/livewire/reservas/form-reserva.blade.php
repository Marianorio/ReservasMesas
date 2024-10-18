<div class="mb-3">
    <label for="codigo_verificacion" class="form-label">Código Verificación</label>
    <input type="text" class="form-control" id="codigo_verificacion" wire:model="ccodigo_verificacion" maxlength="6">
    @error('codigo_verificacion') <span class="text-danger">{{ $message }}</span> @enderror
</div>

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
    <label for="mesa_id" class="form-label">Mesa</label>
    <select class="form-control" id="mesa_id" wire:model="mesa_id">
        <option value="">Seleccionar Mesa</option>
        @foreach(App\Models\Mesa::all() as $mesa)
            <option value="{{ $mesa->id }}">{{ $mesa->numero_mesas }}</option>
        @endforeach
    </select>
    @error('mesa_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label for="user_id" class="form-label">Usuario</label>
    <select class="form-control" id="user_id" wire:model="user_id">
        <option value="">Seleccionar Usuario</option>
        @foreach(App\Models\User::all() as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
