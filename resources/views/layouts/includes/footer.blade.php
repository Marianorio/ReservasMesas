<!-- resources/views/layouts/includes/footer.blade.php -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
<script>
    function initializeDatePicker() {
        const datePickerEl = document.getElementById('fecha_hora');
        if (!datePickerEl) return;

        flatpickr(datePickerEl, {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            locale: "es",
            minDate: "today",
            time_24hr: true,
            minuteIncrement: 30,
            onChange: function(selectedDates, dateStr, instance) {
                Livewire.dispatch('fechaSeleccionada', { fecha: dateStr });
            }
        });
    }

    // Agregar estos event listeners
    document.addEventListener('livewire:initialized', () => {
        initializeDatePicker();
    });

    document.addEventListener('livewire:navigated', () => {
        initializeDatePicker();
    });
</script>
