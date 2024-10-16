<?php

namespace App\Livewire;

use App\Models\Mesa;
use Livewire\Component;

class MesaComponent  extends Component
{
    public $mesas, $mesaId, $numero, $capacidad, $estado;
    public $isModalOpen = 0;

    public function render()
    {
        $this->mesas = Mesa::all(); // Cargar todas las mesas
        return view('livewire.mesa-component')->layout('layouts.app');
    }

    public function abrirModal()
    {
        $this->isModalOpen = true;
    }

    public function cerrarModal()
    {
        $this->resetInputFields();
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->mesaId = null;
        $this->numero = '';
        $this->capacidad = '';
        $this->estado = '';
    }

    public function store()
    {
        $this->validate([
            'numero' => 'required',
            'capacidad' => 'required|numeric',
            'estado' => 'required',
        ]);

        Mesa::updateOrCreate(['id' => $this->mesaId], [
            'numero' => $this->numero,
            'capacidad' => $this->capacidad,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 
            $this->mesaId ? 'Mesa actualizada con éxito.' : 'Mesa creada con éxito.');

        $this->cerrarModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $mesa = Mesa::findOrFail($id);
        $this->mesaId = $id;
        $this->numero = $mesa->numero;
        $this->capacidad = $mesa->capacidad;
        $this->estado = $mesa->estado;

        $this->abrirModal();
    }

    public function delete($id)
    {
        Mesa::find($id)->delete();
        session()->flash('message', 'Mesa eliminada con éxito.');
    }
}


?>