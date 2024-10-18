<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;

class ReservaComponent extends Component
{
    public $reservas;
    public $ccodigo_verificacion;
    public $dfecha;
    public $dhora;
    public $duracion_reserva;
    public $estado;
    public $isCreateModalOpen = false;
    public $isEditModalOpen = false;

    public function insertar()
    {
        //dd($this->ccodigo_verificacion, $this->dfecha, $this->dhora);

        $this->validate([
            'ccodigo_verificacion' => 'required|string|max:6',
            'dfecha' => 'required|date',
            'dhora' => 'required',
        ]);

        
        // Conversión a mayúsculas
        $this->ccodigo_verificacion = strtoupper($this->ccodigo_verificacion);

        // Crear la reserva
        Reserva::create([
            'ccodigo_verificacion' => $this->ccodigo_verificacion,
            'dfecha' => $this->dfecha,
            'dhora' => $this->dhora,
        ]);

        session()->flash('message', 'Reserva creada exitosamente.');
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
