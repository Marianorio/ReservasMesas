<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public $users, $name, $email, $password, $selectedUserId;
    public $isCreateModalOpen = false, $isEditModalOpen = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.users');
    }

    public function agregarUsuario()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = true;
        $this->emit('openModal', 'createUserModal');
    }

    public function guardarUsuario()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->resetInputFields();
        $this->emit('closeModal', 'createUserModal');
        session()->flash('message', 'Usuario agregado exitosamente.');
    }

    public function editarUsuario($id)
    {
        $user = User::findOrFail($id);

        $this->selectedUserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; // Opcional

        $this->isEditModalOpen = true;
        $this->emit('openModal', 'editUserModal');
    }

    public function actualizarUsuario()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->selectedUserId,
        ]);

        $user = User::find($this->selectedUserId);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? bcrypt($this->password) : $user->password,
        ]);

        $this->resetInputFields();
        $this->emit('closeModal', 'editUserModal');
        session()->flash('message', 'Usuario actualizado exitosamente.');
    }

    public function borrar($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }

    private function resetInputFields()
    {
        $this->reset(['name', 'email', 'password', 'selectedUserId']);
    }
}
