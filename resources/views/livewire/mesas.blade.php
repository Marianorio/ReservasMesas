<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>numero_mesas</th>
                <th>cantidad_asientos</th>
                <th>disponibilidad</th>
                <th>reservas activas</th>
                <th>comentarios</th>
            </tr>
        </thead>

        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->numero_mesas}}</td>
                <td>{{$producto->cantidad_asientos}}</td>
                <td>{{$producto->disponibilidad}}</td>
                <td>{{$producto->reservas_activas}}</td>
                <td>{{$producto->comentarios}}</td>
            </tr>
        </tbody>
    </table>
</div>
