<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackComponent extends Component
{
    public $feedbacks;
    public $esVistaCliente = false; // Diferencia entre vistas
    public $calificacion; 
    public $comentario;

    public $isCreateModalOpen = 0;

    public function mount($esVistaCliente = false)
    {
        $this->esVistaCliente = $esVistaCliente;
    }

    public function render()
    {
        // Cargar datos según el contexto
        if ($this->esVistaCliente) {
            $this->feedbacks = Feedback::where('id_usuario', Auth::id())->get(); // Solo reseñas del cliente autenticado
        } else {
            $this->feedbacks = Feedback::all(); // Todas las reseñas
        }

        return view('livewire.feedback-component')->layout('layouts.app');
    }

    // Abrir y cerrar modales de creación
    public function abrirCreateModal()
    {
        $this->isCreateModalOpen = true;
    }

    public function cerrarCreateModal()
    {
        $this->isCreateModalOpen = false;
        $this->reset(['calificacion', 'comentario']);
    }

    public function store()
    {
        $this->validate();

        try {
            Feedback::create([
                'calificacion' => $this->calificacion,
                'comentario' => $this->comentario,
                'id_usuario' => auth()->id(),
            ]);

            session()->flash('message', 'Reseña registrada exitosamente.');
            $this->cerrarCreateModal();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al registrar la reseña: ' . $e->getMessage());
        }
    }


}
