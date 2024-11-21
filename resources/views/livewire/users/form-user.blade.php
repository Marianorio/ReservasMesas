<form>
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" class="form-control" id="email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" wire:model="password">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</form>
