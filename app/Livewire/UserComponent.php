<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public $users, $name, $email, $password, $selectedUserId;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.users');
    }

    public function agregarUsuario()
    {
        $this->reset(['name', 'email', 'password', 'selectedUserId']);
        $this->emit('openModal', 'createUserModal');
    }

    public function guardarUsuario()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->emit('closeModal', 'createUserModal');
    }

    public function editarUsuario($id)
    {
        $user = User::find($id);

        $this->selectedUserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; // Opcional

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

        $this->emit('closeModal', 'editUserModal');
    }

    public function borrar($id)
    {
        User::find($id)->delete();
    }
}
