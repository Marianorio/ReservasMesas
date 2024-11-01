function filtrarMesas(estado) {
    // Obtener todas las mesas
    const mesas = document.querySelectorAll('.mesa');

    // Iterar sobre cada mesa y aplicar el filtro
    mesas.forEach(function(mesa) {
        // Obtener el valor del atributo data-estado
        const estadoMesa = mesa.getAttribute('data-estado');

        if (estado === 'todas') {
            // Mostrar todas las mesas
            mesa.style.display = 'block';
        } else {
            // Comparar el estado de la mesa con el filtro seleccionado
            if (estadoMesa === estado) {
                mesa.style.display = 'block';
            } else {
                mesa.style.display = 'none';
            }
        }
    });
}
