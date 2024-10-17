<?php

namespace App\Livewire;

use App\Models\Mesa;
use Livewire\Component;

class MesaComponent extends Component
{
    public $mesas, $mesaId, $numero, $capacidad, $disponibilidad = 'disponible', $comentarios;
    public $isCreateModalOpen = 0;
    public $isEditModalOpen = 0;

    // Renderizar todas las mesas
    public function render()
    {
        $this->mesas = Mesa::all();
        return view('livewire.mesa-component')->layout('layouts.app');
    }

    // Abrir y cerrar modales de creación
    public function abrirCreateModal()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = true;
    }

    public function cerrarCreateModal()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = false;
    }

    // Abrir y cerrar modales de edición
    public function abrirEditModal($id)
    {
        $this->resetInputFields();
        $this->mesaId = $id;
        $this->loadMesaData($id);
        $this->isEditModalOpen = true;
    }

    public function cerrarEditModal()
    {
        $this->resetInputFields();
        $this->isEditModalOpen = false;
    }

    // Cargar los datos de la mesa para editar
    private function loadMesaData($id)
    {
        $mesa = Mesa::findOrFail($id);
        $this->numero = $mesa->numero_mesas;
        $this->capacidad = $mesa->cantidad_asientos;
        $this->comentarios = $mesa->comentarios;
    }

    // Reseteo de campos
    private function resetInputFields()
    {
        $this->mesaId = null;
        $this->numero = '';
        $this->capacidad = '';
        $this->comentarios = '';
    }

    // Guardar una nueva mesa
    public function store()
    {
        $this->validate([
            'numero' => 'required',
            'capacidad' => 'required|numeric',
            'comentarios' => 'nullable|string',
        ]);

        Mesa::create([
            'numero_mesas' => $this->numero,
            'cantidad_asientos' => $this->capacidad,
            'disponibilidad' => 'disponible',
            'comentarios' => $this->comentarios,
        ]);

        session()->flash('message', 'Mesa creada con éxito.');
        $this->cerrarCreateModal();
    }

    // Actualizar mesa existente
    public function update()
    {
        $this->validate([
            'numero' => 'required',
            'capacidad' => 'required|numeric',
            'comentarios' => 'nullable|string',
        ]);

        Mesa::find($this->mesaId)->update([
            'numero_mesas' => $this->numero,
            'cantidad_asientos' => $this->capacidad,
            'comentarios' => $this->comentarios,
        ]);

        session()->flash('message', 'Mesa actualizada con éxito.');
        $this->cerrarEditModal();
    }

    // Eliminar mesa
    public function delete($id)
    {
        Mesa::find($id)->delete();
        session()->flash('message', 'Mesa eliminada con éxito.');
    }
}


?>