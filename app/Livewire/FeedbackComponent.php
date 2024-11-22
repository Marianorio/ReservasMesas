<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackComponent extends Component
{
    public $feedbacks;
    public $esVistaCliente = false;
    public $calificacion; 
    public $comentario;
    public $isCreateModalOpen = false;

    // Reglas de validación
    protected $rules = [
        'calificacion' => 'required|integer|min:1|max:5',
        'comentario' => 'required|string|min:3|max:255',
    ];

    // Mensajes de validación en español
    protected $messages = [
        'calificacion.required' => 'La calificación es obligatoria.',
        'calificacion.integer' => 'La calificación debe ser un número entero.',
        'calificacion.min' => 'La calificación mínima es 1.',
        'calificacion.max' => 'La calificación máxima es 5.',
        'comentario.required' => 'El comentario es obligatorio.',
        'comentario.min' => 'El comentario debe tener al menos 3 caracteres.',
        'comentario.max' => 'El comentario no puede exceder los 255 caracteres.',
    ];

    public function mount($esVistaCliente = false)
    {
        $this->esVistaCliente = $esVistaCliente;
    }

    public function render()
    {
        if ($this->esVistaCliente) {
            $this->feedbacks = Feedback::where('id_usuario', Auth::id())
                                     ->orderBy('created_at', 'desc')
                                     ->get();
        } else {
            $this->feedbacks = Feedback::with('user')
                                     ->orderBy('created_at', 'desc')
                                     ->get();
        }

        return view('livewire.feedback-component')->layout('layouts.app');
    }

    public function abrirCreateModal()
    {
        $this->resetValidation();
        $this->isCreateModalOpen = true;
    }

    public function cerrarCreateModal()
    {
        $this->isCreateModalOpen = false;
        $this->reset(['calificacion', 'comentario']);
        $this->resetValidation();
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

    public function eliminar($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            
            // Verificar si el usuario actual es el dueño de la reseña o es admin
            if (auth()->id() === $feedback->id_usuario || auth()->user()->hasRole('admin')) {
                $feedback->delete();
                session()->flash('message', 'Reseña eliminada exitosamente.');
            } else {
                session()->flash('error', 'No tienes permiso para eliminar esta reseña.');
            }
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar la reseña: ' . $e->getMessage());
        }
    }

    public function editar($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            
            // Verificar si el usuario actual es el dueño de la reseña
            if (auth()->id() === $feedback->id_usuario) {
                $this->feedbackId = $id;
                $this->calificacion = $feedback->calificacion;
                $this->comentario = $feedback->comentario;
                $this->isEditModalOpen = true;
            } else {
                session()->flash('error', 'No tienes permiso para editar esta reseña.');
            }
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al cargar la reseña: ' . $e->getMessage());
        }
    }

    public function actualizar()
    {
        $this->validate();

        try {
            $feedback = Feedback::findOrFail($this->feedbackId);
            
            // Verificar si el usuario actual es el dueño de la reseña
            if (auth()->id() === $feedback->id_usuario) {
                $feedback->update([
                    'calificacion' => $this->calificacion,
                    'comentario' => $this->comentario,
                ]);
                
                session()->flash('message', 'Reseña actualizada exitosamente.');
                $this->cerrarEditModal();
            } else {
                session()->flash('error', 'No tienes permiso para actualizar esta reseña.');
            }
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al actualizar la reseña: ' . $e->getMessage());
        }
    }

    public function cerrarEditModal()
    {
        $this->isEditModalOpen = false;
        $this->reset(['feedbackId', 'calificacion', 'comentario']);
        $this->resetValidation();
    }
}