<div class="container my-5">
    <div class="mb-4">
    
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Panel - Usuarios</h1>
        </div>
    </div>

        <div class="table-responsive shadow-sm rounded-lg mt-3">
            <!-- Botón para añadir nuevo usuario (puedes descomentarlo si tienes la lógica para añadir usuarios) -->
            <!-- 
            <button wire:click="register" class="btn btn-success mb-3">Nuevo Usuario</button>
            -->
            
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <!-- Botón para eliminar usuario -->
                                <button wire:click="borrar({{ $user->id }})" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
