<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ReservApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/users">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mesas">Mesas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reservas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Reservar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Ver reservas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/feedback">Reseñas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/feedback-cliente">Mis Reseñas</a>
        </li>

        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Mostrando el nombre del usuario autenticado -->
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <!-- Enlace para Editar Perfil -->
            <li>
              <a class="dropdown-item" href="{{ route('profile.show') }}">Editar Perfil</a>
            </li>

            <!-- Formulario para Cerrar Sesión -->
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   this.closest('form').submit();">
                  Cerrar Sesión
                </a>
              </form>
            </li>
          </ul>
        </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>