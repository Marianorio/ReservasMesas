@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container my-5">
    <!-- Panel de control header -->
    <div class="row">
        <div class="col-12 mb-4 text-center">
            <h1 class="display-4">Panel de Control - Mesas</h1>
        </div>
    </div>

    <!-- Filtros de búsqueda -->
    <div class="row justify-content-center mb-4">
        <div class="col-auto">
            <div class="btn-group" role="group">
                <button class="btn btn-outline-primary">Todas</button>
                <button class="btn btn-outline-success">Disponibles</button>
                <button class="btn btn-outline-danger">Ocupadas</button>
                <button class="btn btn-outline-warning">Reservada</button>
            </div>
        </div>
    </div>

    <!-- Mesas -->
    <div class="row text-center">
        <!-- Mesa 001 (Disponible) -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card mesa shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0">Mesa 001</h5>
                </div>
                <div class="card-body">
                    <p class="card-text text-muted">Disponible</p>
                    <i class="bi bi-check-circle text-success" style="font-size: 2rem;"></i>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-outline-primary">Reservar</a>
                </div>
            </div>
        </div>

        <!-- Mesa 002 (Ocupada) -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card mesa shadow-sm border-0">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">Mesa 002</h5>
                </div>
                <div class="card-body">
                    <p class="card-text text-muted">Ocupada</p>
                    <i class="bi bi-x-circle text-danger" style="font-size: 2rem;"></i>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-outline-primary disabled">Reservar</a>
                </div>
            </div>
        </div>

        <!-- Mesa 003 (Reservada) -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card mesa shadow-sm border-0">
                <div class="card-header bg-warning text-white">
                    <h5 class="card-title mb-0">Mesa 003</h5>
                </div>
                <div class="card-body">
                    <p class="card-text text-muted">Reservada</p>
                    <i class="bi bi-exclamation-circle text-warning" style="font-size: 2rem;"></i>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-outline-primary">Reservar</a>
                </div>
            </div>
        </div>

        <!-- Más mesas... -->
    </div>
</div>

@include('layouts.includes.footer')
