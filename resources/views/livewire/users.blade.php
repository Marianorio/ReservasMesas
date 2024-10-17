

<div class="container mx-auto my-10">
    <div class="mb-5">
        <h4 class="text-gray-600 text-lg font-semibold">Gestion de Usuarios</h4>
        <div class="shadow-md rounded-lg overflow-hidden mt-3">

          <button wire:click="register" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo Usuario</button>
            

            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Usuario</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Correo</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4">{{$user->id}}</td>
                            <td class="px-6 py-4">{{$user->name}}</td>
                            <td class="px-6 py-4">{{$user->email}}</td>
                            <td class="border px-4 py-2 text-center">
                              <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                              <button wire:click="borrar({{$user->id}})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4">Eliminar</button>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

