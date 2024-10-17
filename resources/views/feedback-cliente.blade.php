@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container my-5">

    <!-- Título de la Página -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Mis Reseñas</h1>
        </div>
    </div>

    <!-- Formulario de Nueva Reseña -->
    <div class="row mb-4">
        <div class="col-12">
            <h2>Deja tu Reseña</h2>
            <form id="reviewForm">
                <div class="mb-3">
                    <label for="clientName" class="form-label">Tu Nombre</label>
                    <input type="text" class="form-control" id="clientName" required>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Calificación</label>
                    <select class="form-select" id="rating" required>
                        <option value="">Selecciona una calificación</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comentario</label>
                    <textarea class="form-control" id="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Reseña</button>
            </form>
        </div>
    </div>

    <!-- Mis Reseñas -->
    <div class="row">
        <div class="col-12">
            <h2>Mis Reseñas Anteriores</h2>
            <table class="table table-striped table-hover" id="myReviewsTable">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Calificación</th>
                        <th>Comentario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/10/2024</td>
                        <td>⭐⭐⭐⭐⭐</td>
                        <td>Excelente servicio y atención.</td>
                        <td>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>30/09/2024</td>
                        <td>⭐⭐⭐⭐</td>
                        <td>La comida estuvo deliciosa, volveré.</td>
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


@include('layouts.includes.footer')
