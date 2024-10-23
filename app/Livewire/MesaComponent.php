<?php

namespace App\Livewire;

use App\Models\Mesa;
use Livewire\Component;

class MesaComponent extends Component
{
    public $mesas, $nro_mesa, $capacidad, $disponibilidad = 'disponible', $comentarios;
    public $isCreateModalOpen = 0;
    public $isEditModalOpen = 0;
    public $selectedStatus = 'todas';

    public function mount()
    {
        // Cargar todas las mesas por defecto
        $this->mesas = Mesa::all();
    }

    public function filter($status)
    {
        $this->selectedStatus = $status;

        // Filtrar las mesas por el estado seleccionado
        if ($status === 'todas') {
            $this->mesas = Mesa::all();
        } else {
            $this->mesas = Mesa::where('disponibilidad', $status)->get();
        }
    }
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

    public function abrirEditModal($numero_mesas)
    {
        $this->resetInputFields();
        $this->nro_mesa = $numero_mesas;
        $this->loadMesaData($numero_mesas);
        $this->isEditModalOpen = true;
    }
    
    private function loadMesaData($numero_mesas)
    {
        $mesa = Mesa::findOrFail($numero_mesas);
        $this->capacidad = $mesa->cantidad_asientos;
        $this->comentarios = $mesa->comentarios;
    }
    
    public function update()
    {
        $this->validate([
            'capacidad' => 'required|numeric',
            'comentarios' => 'nullable|string',
        ]);
    
        Mesa::find($this->nro_mesa)->update([
            'cantidad_asientos' => $this->capacidad,
            'comentarios' => $this->comentarios,
        ]);
    
        session()->flash('message', 'Mesa actualizada con éxito.');
        $this->cerrarEditModal();
    }
    
    public function delete($numero_mesas)
    {
        Mesa::find($numero_mesas)->delete();
        session()->flash('message', 'Mesa eliminada con éxito.');
    }
    

}
?>