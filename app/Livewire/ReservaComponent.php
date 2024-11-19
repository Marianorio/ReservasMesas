<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\DetalleReserva;

class ReservaComponent extends Component
{
    public $ccodigo_verificacion,
    $dfecha,
    $dhora,
    $duracion_reserva = 50,
    $estado = 'pendiente';
    public $id_usuario, $numero_mesa, $cantidad_asientos;

    public $numeroReserva, $reservas,
    $isCreateModalOpen = false,
    $isEditModalOpen = false;

    public $paso = 1;

    public $fecha_hora;

    function generarCodigoVerificacion($longitud = 6)
    {
        // Definir el conjunto de caracteres que deseas utilizar
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Mezclar los caracteres y seleccionar un subconjunto aleatorio
        return substr(str_shuffle($caracteres), 0, $longitud);
    }

    public function render()
    {
        $this->reservas = Reserva::with('detalleReserva.mesa', 'detalleReserva.user')->get();
        return view('livewire.reservas.reserva-component')->layout('layouts.app');
    }

    public function siguientePaso()
    {
        $this->validate([
            'cantidad_asientos' => 'required|integer|min:1',
            'numero_mesa' => 'required|exists:mesas,numero_mesas',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $this->paso = 2;
        $this->dispatch('paso2');
    }

    public function pasoAnterior()
    {
        $this->paso = 1;
    }

    // Función para abrir el modal de creación
    public function abrirCreateModal()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = true;
    }
    public function abrirEditModal($nnumero_reserva)
    {
        $this->reservaId = $nnumero_reserva; // Asignar la reserva seleccionada
        $reserva = Reserva::find($nnumero_reserva); // Obtener la reserva
        if ($reserva) {
            // Cargar los datos en las propiedades
            $this->ccodigo_verificacion = $reserva->ccodigo_verificacion;
            $this->dfecha = $reserva->dfecha;
            $this->dhora = $reserva->dhora;
            $this->duracion_reserva = $reserva->duracion_reserva;
            $this->estado = $reserva->estado;

            // Cargar detalles si es necesario
            $detalle = DetalleReserva::where('nnumero_reserva', $nnumero_reserva)->first();
            if ($detalle) {
                $this->id_usuario = $detalle->id_usuario;
                $this->numero_mesa = $detalle->numero_mesa;
                $this->cantidad_asientos = $detalle->cantidad_asientos;
            }
        }
        $this->isEditModalOpen = true; // Abrir el modal
    }
    // Función para cerrar el modal de creación
    public function cerrarCreateModal()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = false;
    }
    public function cerrarEditModal()
    {
        $this->resetInputFields();
        $this->isEditModalOpen = false;
    }
    private function resetInputFields()
    {
        $this->ccodigo_verificacion = '';
        $this->dfecha = '';
        $this->dhora = '';
        $this->duracion_reserva = 50;
        $this->estado = 'pendiente';
        $this->id_usuario = '';
        $this->numero_mesa = '';
        $this->cantidad_asientos = '';
        $this->paso = 1;
    }
    public function insertar()
    {
        // Validación
        $this->validate([
            'fecha_hora' => 'required|date_format:Y-m-d H:i',
            'duracion_reserva' => 'nullable|integer',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'numero_mesa' => 'required|exists:mesas,numero_mesas',
            'id_usuario' => 'required|exists:users,id',
            'cantidad_asientos' => 'required|integer|min:1',
        ]);

        // Separar fecha_hora en fecha y hora
        $fechaHora = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $this->fecha_hora);
        $this->dfecha = $fechaHora->toDateString();
        $this->dhora = $fechaHora->format('H:i');

        // Validar reserva existente
        $reservaExistente = Reserva::where('dfecha', $this->dfecha)
            ->whereHas('detalleReserva', function ($query) {
                $query->where('numero_mesa', $this->numero_mesa);
            })
            ->exists();

        if ($reservaExistente) {
            $this->cerrarCreateModal();
            session()->flash('error', 'Ya existe una reserva para esta mesa en la fecha seleccionada.');
            return;
        }

        // Generar código y crear reserva
        $this->ccodigo_verificacion = $this->generarCodigoVerificacion();

        // Crear la reserva
        $reserva = Reserva::create([
            'ccodigo_verificacion' => $this->ccodigo_verificacion,
            'dfecha' => $this->dfecha,
            'dhora' => $this->dhora,
            'duracion_reserva' => $this->duracion_reserva,
            'estado' => $this->estado
        ]);

        // Crear el detalle de la reserva
        DetalleReserva::create([
            'nnumero_reserva' => $reserva->nnumero_reserva,
            'id_usuario' => $this->id_usuario,
            'numero_mesa' => $this->numero_mesa,
            'cantidad_asientos' => $this->cantidad_asientos,
        ]);

        // Mensaje de éxito
        session()->flash('message', 'Reserva creada exitosamente.');

        // Cerrar modal o limpiar los campos
        $this->resetInputFields();
        $this->cerrarCreateModal();
    }
    public function actualizar()
    {
        //dd($this->ccodigo_verificacion, $this->dfecha, $this->dhora, $this->estado, $this->id_usuario, $this->numero_mesa, $this->cantidad_asientos);

        // Validación
        $this->validate([
            'dfecha' => 'required|date',
            'dhora' => 'required|date_format:H:i',
            'duracion_reserva' => 'nullable|integer',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'numero_mesa' => 'required|exists:mesas,numero_mesas',
            'id_usuario' => 'required|exists:users,id',
            'cantidad_asientos' => 'required|integer|min:1',
        ]);

        // Actualizar la reserva
        $reserva = Reserva::find($this->numeroReserva);
        if ($reserva) {
            $reserva->update([
                'ccodigo_verificacion' => $this->ccodigo_verificacion,
                'dfecha' => $this->dfecha,
                'dhora' => $this->dhora,
                'duracion_reserva' => $this->duracion_reserva,
                'estado' => $this->estado,
            ]);
        }

        // Actualizar el detalle de la reserva
        $detalle = DetalleReserva::where('nnumero_reserva', $this->reservaId)->first();
        if ($detalle) {
            $detalle->update([
                'id_usuario' => $this->id_usuario,
                'numero_mesa' => $this->numero_mesa,
                'cantidad_asientos' => $this->cantidad_asientos,
            ]);
        }

        // Mensaje de éxito
        session()->flash('message', 'Reserva actualizada con éxito.');

        // Cerrar el modal
        $this->cerrarEditModal();
    }

    public function eliminar($nnumero_reserva)
    {
        Reserva::find($nnumero_reserva)->delete();
        session()->flash('message', 'Reserva eliminada con éxito.');
    }

    public function updatedPaso($value)
    {
        if ($value === 2) {
            $this->dispatch('initDatePicker');
        }
    }

    protected function rules()
    {
        return [
            'fecha_hora' => 'required|date_format:Y-m-d H:i',
            // ... otras reglas de validación
        ];
    }
}
