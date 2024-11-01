@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container my-5">

    <!-- Panel de Control Header -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="display-4">Panel de Control - Reservas de Mesas</h1>
            <p class="text-muted">Estado general de las mesas y reservas en el restaurante</p>
        </div>
    </div>

    <!-- Estadísticas Generales -->
    <div class="row text-center mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-success shadow">
                <div class="card-body">
                    <h5 class="card-title text-success">Mesas Totales</h5>
                    <h2>20</h2>
                    <p class="card-text">Capacidad total del restaurante</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-info shadow">
                <div class="card-body">
                    <h5 class="card-title text-info">Mesas Disponibles</h5>
                    <h2>8</h2>
                    <p class="card-text">Mesas actualmente libres</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h5 class="card-title text-danger">Mesas Ocupadas</h5>
                    <h2>8</h2>
                    <p class="card-text">Mesas ocupadas por clientes</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-warning shadow">
                <div class="card-body">
                    <h5 class="card-title text-warning">Mesas Reservadas</h5>
                    <h2>4</h2>
                    <p class="card-text">Mesas reservadas para futuros clientes</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Próximas Reservas -->
    <div class="row mb-5">
        <div class="col-12">
            <h4 class="text-muted">Próximas Reservas</h4>
            <table class="table table-striped table-hover shadow-sm mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Mesa</th>
                        <th>Hora de Reserva</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Pérez</td>
                        <td>Mesa 003</td>
                        <td>12:30 PM</td>
                        <td><span class="badge bg-warning">Reservada</span></td>
                        <td><a href="#" class="btn btn-outline-primary btn-sm">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td>María López</td>
                        <td>Mesa 007</td>
                        <td>01:00 PM</td>
                        <td><span class="badge bg-warning">Reservada</span></td>
                        <td><a href="#" class="btn btn-outline-primary btn-sm">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td>Carlos Sánchez</td>
                        <td>Mesa 010</td>
                        <td>01:30 PM</td>
                        <td><span class="badge bg-danger">Ocupada</span></td>
                        <td><a href="#" class="btn btn-outline-primary btn-sm">Ver Detalles</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Estadísticas adicionales -->
    <div class="row mb-5 text-center">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-sm border-light">
                <div class="card-body">
                    <h5 class="card-title">Reservas del Día</h5>
                    <h3>12</h3>
                    <p>Reservas confirmadas para hoy</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card shadow-sm border-light">
                <div class="card-body">
                    <h5 class="card-title">Cancelaciones del Día</h5>
                    <h3>2</h3>
                    <p>Reservas canceladas hasta el momento</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de Tasa de Ocupación (Placeholder para un gráfico) -->
    <div class="row">
        <div class="col-12 mb-5">
            <h4 class="text-muted">Tasa de Ocupación</h4>
            <div class="p-3 bg-light border rounded shadow-sm">
                <p class="text-center">[Gráfico de tasa de ocupación del restaurante]</p>
            </div>
        </div>
    </div>
    
</div>

@include('layouts.includes.footer')
