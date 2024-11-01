document.addEventListener('DOMContentLoaded', function() {
    const inputBusqueda = document.getElementById('inputBusqueda');
    const tablaResenas = document.getElementById('tablaResenas').getElementsByTagName('tbody')[0];

    inputBusqueda.addEventListener('input', filtrarResenas);

    function filtrarResenas() {
        const terminoBusqueda = inputBusqueda.value.toLowerCase();
        const filas = tablaResenas.getElementsByTagName('tr');

        for (let i = 0; i < filas.length; i++) {
            const celdas = filas[i].getElementsByTagName('td');
            const numeroMesa = celdas[1].textContent.toLowerCase(); // Cambia 0 al índice correcto según tu tabla

            // Comprobar si el número de mesa incluye el término de búsqueda
            if (numeroMesa.includes(terminoBusqueda)) {
                filas[i].style.display = ''; // Mostrar la fila si coincide
            } else {
                filas[i].style.display = 'none'; // Ocultar la fila si no coincide
            }
        }
    }
});
