<!-- resources/views/layouts/includes/head.blade.php -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>reservApp</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Estilos Personalizados -->
<style>
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro semi-transparente */
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    z-index: 1; /* Coloca el overlay sobre el contenido de la card */
    transition: opacity 0.5s ease-in-out;
  }

  .mesa:hover .overlay {
    opacity: 1; /* El efecto de desvanecimiento */
  }

  .card-body {
    position: relative;
    z-index: 0; /* Asegura que el contenido de la card esté por debajo del overlay */
  }
</style>
