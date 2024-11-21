<?php

namespace App\Livewire;

use App\Models\Mesa;
use Livewire\Component;

class MesaComponent extends Component
{
    public $mesas;
    public $numero_mesas;
    public $cantidad_asientos;
    public $disponibilidad = 'Disponible';
    public $comentario;
    public $isCreateModalOpen = false;
    public $isEditModalOpen = false;
    public $search = '';

    public function mount()
    {
        $this->loadMesas();
    }

    public function render()
    {
        $query = Mesa::query();
        
        if ($this->search) {
            $query->where('numero_mesas', 'like', '%' . $this->search . '%');
        }

        $this->mesas = $query->orderBy('numero_mesas')->get();
        
        return view('livewire.mesa-component')->layout('layouts.app');
    }

    public function loadMesas()
    {
        $this->mesas = Mesa::orderBy('numero_mesas')->get();
    }

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
        $mesa = Mesa::where('numero_mesas', $numero_mesas)->firstOrFail();
        
        $this->numero_mesas = $mesa->numero_mesas;
        $this->cantidad_asientos = $mesa->cantidad_asientos;
        $this->disponibilidad = $mesa->disponibilidad;
        $this->comentario = $mesa->comentario;
        
        $this->isEditModalOpen = true;
    }

    public function cerrarEditModal()
    {
        $this->resetInputFields();
        $this->isEditModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->numero_mesas = null;
        $this->cantidad_asientos = null;
        $this->disponibilidad = 'Disponible';
        $this->comentario = null;
    }

    public function store()
    {
        $this->validate([
            'cantidad_asientos' => 'required|numeric|min:1',
            'comentario' => 'nullable|string|max:255',
        ]);

        // Obtener el último número de mesa y sumar 1
        $ultimoNumero = Mesa::max('numero_mesas') ?? 0;
        $nuevoNumero = $ultimoNumero + 1;

        Mesa::create([
            'numero_mesas' => $nuevoNumero,
            'cantidad_asientos' => $this->cantidad_asientos,
            'disponibilidad' => 'Disponible',
            'comentario' => $this->comentario,
        ]);

        session()->flash('message', 'Mesa creada con éxito.');
        $this->cerrarCreateModal();
        $this->loadMesas();
    }

    public function update()
    {
        $this->validate([
            'cantidad_asientos' => 'required|numeric|min:1',
            'disponibilidad' => 'required|in:Disponible,No Disponible',
            'comentario' => 'nullable|string|max:255',
        ]);

        $mesa = Mesa::where('numero_mesas', $this->numero_mesas)->firstOrFail();
        
        $mesa->update([
            'cantidad_asientos' => $this->cantidad_asientos,
            'disponibilidad' => $this->disponibilidad,
            'comentario' => $this->comentario,
        ]);

        session()->flash('message', 'Mesa actualizada con éxito.');
        $this->cerrarEditModal();
        $this->loadMesas();
    }

    public function delete($numero_mesas)
    {
        $mesa = Mesa::where('numero_mesas', $numero_mesas)->firstOrFail();
        $mesa->delete();
        
        session()->flash('message', 'Mesa eliminada con éxito.');
        $this->loadMesas();
    }

    // Método para cambiar rápidamente la disponibilidad
    public function toggleDisponibilidad($numero_mesas)
    {
        $mesa = Mesa::where('numero_mesas', $numero_mesas)->firstOrFail();
        $mesa->disponibilidad = $mesa->disponibilidad === 'Disponible' ? 'No Disponible' : 'Disponible';
        $mesa->save();
        
        $this->loadMesas();
    }
}