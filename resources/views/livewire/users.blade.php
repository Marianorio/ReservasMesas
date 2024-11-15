<div class="container my-5">
    <div class="mb-4">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4">Panel - Usuarios</h1>
            </div>
        </div>

        <div class="text-center mb-4">
            <button id="showUsuarios" class="btn btn-primary">Ver Usuarios</button>
            <button id="showEmpleados" class="btn btn-secondary">Ver Empleados</button>
        </div>

        <!-- Tabla de todos los usuarios -->
        <div id="usuariosTable" class="table-responsive shadow-sm rounded-lg">
            <h5 class="text-center">Todos los Usuarios</h5>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
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
                                <button wire:click="borrar()" class="btn btn-primary">Modificar</button>
                                <button wire:click="borrar({{ $user->id }})" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabla de empleados -->
        <div id="empleadosTable" class="table-responsive shadow-sm rounded-lg d-none">
            <h5 class="text-center">Empleados</h5>
            <button wire:click="asignarEmpleado()" class="btn btn-success mb-2">Asignar Empleado</button>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <button wire:click="borrar()" class="btn btn-primary">Modificar</button>
                                <button wire:click="borrar()" class="btn btn-danger">Eliminar</button>
                                <button wire:click="rol()" class="btn btn-warning">Rol</button>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const usuariosTable = document.getElementById("usuariosTable");
        const empleadosTable = document.getElementById("empleadosTable");
        const showUsuarios = document.getElementById("showUsuarios");
        const showEmpleados = document.getElementById("showEmpleados");

        // Mostrar tabla de usuarios
        showUsuarios.addEventListener("click", () => {
            usuariosTable.classList.remove("d-none");
            empleadosTable.classList.add("d-none");
            showUsuarios.classList.remove("btn-secondary");
            showUsuarios.classList.add("btn-primary");
            showEmpleados.classList.remove("btn-primary");
            showEmpleados.classList.add("btn-secondary");
        });

        // Mostrar tabla de empleados
        showEmpleados.addEventListener("click", () => {
            empleadosTable.classList.remove("d-none");
            usuariosTable.classList.add("d-none");
            showEmpleados.classList.remove("btn-secondary");
            showEmpleados.classList.add("btn-primary");
            showUsuarios.classList.remove("btn-primary");
            showUsuarios.classList.add("btn-secondary");
        });
    });
</script>
