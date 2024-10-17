
document.addEventListener('DOMContentLoaded', function() {
    const inputBusqueda = document.getElementById('inputBusqueda');
    const filtroCalificacion = document.getElementById('filtroCalificacion');
    const tablaResenas = document.getElementById('tablaResenas').getElementsByTagName('tbody')[0];

    inputBusqueda.addEventListener('input', filtrarResenas);
    filtroCalificacion.addEventListener('change', filtrarResenas);

    function filtrarResenas() {
        const terminoBusqueda = inputBusqueda.value.toLowerCase();
        const calificacionSeleccionada = filtroCalificacion.value;
        const filas = tablaResenas.getElementsByTagName('tr');

        for (let i = 0; i < filas.length; i++) {
            const celdas = filas[i].getElementsByTagName('td');
            const nombreCliente = celdas[0].textContent.toLowerCase();
            const calificacionResena = celdas[2].textContent.replace('⭐', '').length;

            let coincideBusqueda = nombreCliente.includes(terminoBusqueda);
            let coincideCalificacion = calificacionSeleccionada === "" || calificacionResena == calificacionSeleccionada;

            if (coincideBusqueda && coincideCalificacion) {
                filas[i].style.display = '';
            } else {
                filas[i].style.display = 'none';
            }
        }
    }
});

