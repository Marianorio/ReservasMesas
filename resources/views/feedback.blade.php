@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container my-5">

    <!-- Panel de Control Header -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Panel - Reseñas de Clientes</h1>
        </div>
    </div>

    <!-- Filtros de Búsqueda -->
    <div class="row mb-4">
        <div class="col-md-6 mb-2">
            <input type="text" id="inputBusqueda" class="form-control" placeholder="Buscar por cliente...">
        </div>
        <div class="col-md-6 mb-2">
            <select id="filtroCalificacion" class="form-select">
                <option value="">Filtrar por Calificación</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
            </select>
        </div>
    </div>

    <!-- Tabla de Reseñas -->
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover" id="tablaResenas">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Calificación</th>
                        <th>Comentario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Pérez</td>
                        <td>01/10/2024</td>
                        <td>⭐⭐⭐⭐⭐</td>
                        <td>Excelente servicio y atención.</td>
                        <td>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>María López</td>
                        <td>30/09/2024</td>
                        <td>⭐⭐⭐⭐</td>
                        <td>La comida estuvo deliciosa, volveré.</td>
                        <td>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Carlos García</td>
                        <td>28/09/2024</td>
                        <td>⭐⭐</td>
                        <td>El servicio fue muy lento.</td>
                        <td>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Más filas de reseñas... -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="{{ asset('js/feedback.js') }}"></script>


@include('layouts.includes.footer')
