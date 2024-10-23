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
}
