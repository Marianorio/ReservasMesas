// JavaScript para ocultar el indicador de carga una vez que la página haya terminado de cargar
window.addEventListener('load', function() {
    let loadingOverlay = document.getElementById('loading-overlay');
    loadingOverlay.classList.add('hidden');
});