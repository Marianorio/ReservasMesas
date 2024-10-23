<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\DetalleReserva;

class ReservaComponent extends Component
{
    public $ccodigo_verificacion, $dfecha, $dhora, $duracion_reserva=50, $estado = 'pendiente';
    public $id_usuario, $id_mesa, $cantidad_asientos;

    public $isCreateModalOpen = false;
    public $isEditModalOpen = false;
    function generarCodigoVerificacion($longitud = 6) {
        // Definir el conjunto de caracteres que deseas utilizar
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // Mezclar los caracteres y seleccionar un subconjunto aleatorio
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    

    public function insertar()
    {
        // Validación
        $this->validate([
            'dfecha' => 'required|date',
            'dhora' => 'required|date_format:H:i:s',
            'duracion_reserva' => 'nullable|integer',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'id_mesa' => 'required|exists:mesas,numero_mesas',
            'id_usuario' => 'required|exists:users,id',
            'cantidad_asientos' => 'required|integer|min:1',
        ]);

        // Generar el código de verificación
        $this->ccodigo_verificacion = $this->generarCodigoVerificacion();

        // Crear la reserva
        $reserva = Reserva::create([
            'ccodigo_verificacion' => $this->ccodigo_verificacion,
            'dfecha' => $this->dfecha,
            'dhora' => $this->dhora,
            'duracion_reserva' => $this->duracion_reserva,
            'estado' => $this->estado,
        ]);

        // Crear el detalle de la reserva
        DetalleReserva::create([
            'nnumero_reserva' => $reserva->nnumero_reserva, // Usar la reserva creada
            'id_usuario' => $this->id_usuario,
            'id_mesa' => $this->id_mesa,
            'cantidad_asientos' => $this->cantidad_asientos,
        ]);

        // Mensaje de éxito
        session()->flash('message', 'Reserva y su detalle creados exitosamente.');

        // Cerrar modal o limpiar los campos
        $this->cerrarCreateModal();
    }
    

    public function render()
    {
        // Cargar todas las reservas desde la base de datos
        $this->reservas = Reserva::with('mesa', 'user')->get();
        return view('livewire.reservas.reserva-component')->layout('layouts.app');

    }

    public function abrirCreateModal()
    {
        $this->isCreateModalOpen = true;
    }

    public function abrirEditModal($id)
    {
        $this->isEditModalOpen = true;
        // Código para cargar y editar la reserva
    }
    public function cerrarCreateModal()
    {
        $this->isCreateModalOpen = false;
        //$this->resetInputFields(); // O cualquier otra lógica para cerrar el modal
    }
    public function cerrarEditModal()
    {
        $this->isEditModalOpen = false;
        $this->resetInputFields(); // O cualquier otra lógica para cerrar el modal
    }

    public function delete($id)
    {
        Reserva::find($id)->delete();
        session()->flash('message', 'Reserva eliminada con éxito.');
    }
}
