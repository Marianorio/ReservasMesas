<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- CSS AOS - Animar Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

  <!-- Añadir un loader por aqui -->
  <div id="loading-overlay" class="loading-overlay">
    <div class="spinner-border text-yellow" role="status"></div>
  </div>

  <!-- Boton de scroll hacia arriba -->
  <button id="scrollToTop" onclick="" class="border-0 rounded-circle text-dark-blue p-3 position-fixed bottom-0 end-0 me-3 d-flex justify-content-center align-items-center d-none"><i class="bi bi-arrow-up fw-bold"></i></button>

    <!-- Header -->
    <header class="bg-dark-blue">
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg bg- navbar-dark py-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo" width="90px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#ofertas">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#menu">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feedbacks">Opiniones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nosotros">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contáctanos</a>
                        </li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-yellow text-dark-blue fw-bold rounded-circle d-flex justify-content-center align-items-center" style="width: 45px; height: 45px;"><i class="bi bi-person-fill"></i></a>
                </div>
            </div>
        </nav>

        <!-- Seccion principal -->
        <main id="home" class="container vh-md-100 py-5">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md-6 order-2 order-md-1 d-flex flex-column justify-content-center align-items-center align-items-md-start text-center text-md-start">
                    <h1 class="display-1 fw-bold text-yellow">Casa Gourmet</h1>
                    <p class="display-5 fw-bold text-white">Calidad y sabor en cada bocado</p>
                    <div>
                      <a href="#menu" class="btn btn-yellow py-2 px-4 fs-5 rounded-5 fw-bold">Nuestro menú</a>
                      <a href="#reserva" class="btn btn-white py-2 px-4 fs-5 rounded-5 fw-bold">Reservar</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2">
                    <img src="{{ asset('images/hamburguesa.png') }}" alt="Deliciosa hamburguesa" class="w-100 h-100">
                </div>
            </div>
        </main>
    </header>

    <!-- Sección Ofertas -->
    <div id="ofertas" class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 section-title">
            <h2 class="text-center text-dark-blue mb-5">Ofertas Especiales</h2>
        </div>
          <div class="col-12 d-flex flex-column gap-4 gap-md-2 flex-md-row">
            <div class="col-12 col-md-4">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/pasta.jpg') }}" class="card-img-top" alt="Pasta">
                <div class="card-body text-center">
                  <h5 class="card-title">Pasta</h5>
                  <p class="card-text">Obtén un <span class="fs-5">20%</span> de descuento en tu <span class="fs-5">PRIMER ORDEN</span></p>
                  <p class="fs-4 fw-bold">$1500</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/hamburguesa.jpeg') }}" class="card-img-top" alt="Hamburguesa">
                <div class="card-body text-center">
                  <h5 class="card-title">Hamburguesa</h5>
                  <p class="card-text">Obtén un <span class="fs-5">20%</span> de descuento en tu <span class="fs-5">PRIMER ORDEN</span></p>
                  <p class="fs-4 fw-bold">$1500</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/combo.jpeg') }}" class="card-img-top" alt="Combo">
                <div class="card-body text-center">
                  <h5 class="card-title">Combo</h5>
                  <p class="card-text">Obtén un <span class="fs-5">20%</span> de descuento en tu <span class="fs-5">PRIMER ORDEN</span></p>
                  <p class="fs-4 fw-bold">$1500</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Seccion Menu -->
    <div id="menu" class="py-5 bg-dark-blue-light">
        <div class="container">
            <div class="row">
                <div class="col-12 section-title">
                    <h2 class="text-center text-yellow mb-5">Nuestro Menú</h2>
                </div>

                <div class="categorias-btn mb-4 d-flex flex-wrap gap-2">
                  <button class="btn btn-white py-2 px-4 fs-5 rounded-5 fw-bold">Todos</button>
                  <button class="btn btn-white py-2 px-4 fs-5 rounded-5 fw-bold">Hamburguesas</button>
                  <button class="btn btn-white py-2 px-4 fs-5 rounded-5 fw-bold">Pizzas</button>
                  <button class="btn btn-white py-2 px-4 fs-5 rounded-5 fw-bold">Bebidas</button>
                </div>

                <div id="productos" class="d-flex gap-3 justify-content-center flex-wrap">
                    <!-- Aquí se muestran el menú -->
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-yellow py-2 px-4 mt-5 rounded-5 text-dark-blue fw-bold">Ver menú completo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Reserva -->
    <div id="reserva" class="py-5 text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="display-4 mb-4 text-white">¡Haz tu Reserva Ahora!</h2>
            <p class="lead mb-4 text-white">¿Estás listo para disfrutar de una experiencia gastronómica única en Casa Gourmet? Reserva tu mesa hoy mismo y asegúrate un lugar en nuestro restaurante.</p>
            <a href="#" class="btn btn-yellow btn-lg px-5 py-3 rounded-5 text-dark-blue fw-bold">Reserva Ahora</a>
          </div>
        </div>
      </div>
    </div>



    <!-- Seccion Feedback -->
    <div id="feedbacks" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 section-title">
                    <h2 class="text-center text-dark-blue mb-5">Opiniones de Nuestros Clientes</h2>
                </div>
                <div class="feedback-clientes d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-dark-blue">Anna</h5>
                            <div class="stars text-yellow mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="card-text text-dark-blue">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-dark-blue">Marcus</h5>
                            <div class="stars text-yellow mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="card-text text-dark-blue">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-dark-blue">Jessica</h5>
                            <div class="stars text-yellow mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="card-text text-dark-blue">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Sección "Sobre Nosotros" -->
    <div id="nosotros" class="bg-dark-blue py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 section-title">
                    <h2 class="text-center text-yellow mb-5">Sobre Nosotros</h2>
                </div>
                <div class="col-12 col-md-6">
                    <p class="text-white fs-5">En Casa Gourmet, nos especializamos en la creación de experiencias culinarias inolvidables. Ofrecemos platos preparados con ingredientes frescos, seleccionados cuidadosamente para garantizar la mejor calidad en cada comida.</p>
                </div>
                <div class="col-12 col-md-6">
                    <p class="text-white fs-5">Nuestro objetivo es proporcionar a nuestros clientes no solo comida deliciosa, sino también un ambiente cálido y acogedor donde puedan disfrutar de buenos momentos junto a sus seres queridos.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección Contacto -->
    <div id="contacto" class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-4">
            <div class="col-12 section-title">
              <h2 class="text-center text-dark-blue mb-5">Nuestra Ubicación</h2>
            </div>
            <p class="lead text-dark-blue">Visítanos en nuestra dirección para disfrutar de una experiencia culinaria única. ¡Te esperamos!</p>
          </div>
          <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14326.096952692147!2d-58.1750637445801!3d-26.147051099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945ca5a7b31a74b7%3A0x856e8f8f6b31c71b!2sEl%20Morfi!5e0!3m2!1ses!2sar!4v1726819429894!5m2!1ses!2sar" width="100%" height="500" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer -->
    <footer class="bg-dark-blue text-white text-center py-3">
        <div class="container">
            <p>&copy; Casa Gourmet. Todos los derechos reservados.</p>
            <div class="social-icons fs-2">
                <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class=""><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="{{ asset('js/scroll-to-top.js') }}"></script>
    <script src="{{ asset('js/cargarMenu.js') }}"></script>
    <!-- Script animar scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Metodo para arrancar las animaciones scroll -->
    <script>
      AOS.init({
        //para la duracion de la animacion
        duration: 1300,
        once: true //Para que la animacion no se repita
      });
    </script>
</body>

</html>
