<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users;

    public function register()
    {
        return redirect('/register'); // Redirige a la ruta de registro
    }

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users')->layout('layouts.app');
    }

    public function borrar($id)
    {
        User::find($id)->delete();
    }

    // -------------- MODAL --------------

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