<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa; // Asegúrate de usar el modelo correcto

class Mesas extends Component
{
    public $mesas;

    public function render()
    {
        $this->mesas = Mesa::all(); // Usa el modelo correcto (Mesa)
        return view('livewire.mesas');
    }
}
