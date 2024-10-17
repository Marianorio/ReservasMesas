@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container mx-auto my-10">
    <div class="mb-5">
        <h4 class="text-gray-600 text-lg font-semibold">Próximas Reservas</h4>
        <div class="shadow-md rounded-lg overflow-hidden mt-3">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">Usuario</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Rol</th>
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
                            <td class="px-6 py-4">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm">Ver Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.includes.footer')
