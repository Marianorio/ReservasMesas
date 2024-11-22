<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use App\Models\DetalleReserva;

class ReservaComponent extends Component
{
    public $ccodigo_verificacion,
    $dfecha,
    $dhora,
    $duracion_reserva = 50,
    $estado = 'pendiente';
    public $id_usuario, $numero_mesa, $cantidad_asientos;

    public $reservaId, $reservas,
    $isCreateModalOpen = false,
    $isEditModalOpen = false;

    function generarCodigoVerificacion($longitud = 6)
    {
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }

    public function render()
    {
        $this->reservas = Reserva::with('detalleReserva.mesa', 'detalleReserva.user')->get();
        return view('livewire.reservas.reserva-component')->layout('layouts.app');
    }

    public function abrirCreateModal()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = true;
    }

    public function abrirEditModal($nnumero_reserva)
    {
        $this->reservaId = $nnumero_reserva;
        $reserva = Reserva::find($nnumero_reserva);
        if ($reserva) {
            $this->ccodigo_verificacion = $reserva->ccodigo_verificacion;
            $this->dfecha = $reserva->dfecha;
            $this->dhora = $reserva->dhora;
            $this->duracion_reserva = $reserva->duracion_reserva;
            $this->estado = $reserva->estado;

            $detalle = DetalleReserva::where('nnumero_reserva', $nnumero_reserva)->first();
            if ($detalle) {
                $this->id_usuario = $detalle->id_usuario;
                $this->numero_mesa = $detalle->numero_mesa;
                $this->cantidad_asientos = $detalle->cantidad_asientos;
            }
        }
        $this->isEditModalOpen = true;
    }

    public function cerrarCreateModal()
    {
        $this->resetInputFields();
        $this->isCreateModalOpen = false;
    }

    public function cerrarEditModal()
    {
        $this->resetInputFields();
        $this->isEditModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->ccodigo_verificacion = '';
        $this->dfecha = '';
        $this->dhora = '';
        $this->duracion_reserva = 50;
        $this->estado = 'pendiente';
        $this->id_usuario = '';
        $this->numero_mesa = '';
        $this->cantidad_asientos = '';
        $this->reservaId = null;
    }

    public function insertar()
    {
        $this->validate([
            'dfecha' => 'required|date',
            'dhora' => 'required|date_format:H:i',
            'duracion_reserva' => 'nullable|integer',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'numero_mesa' => 'required|exists:mesas,numero_mesas',
            'id_usuario' => 'required|exists:users,id',
            'cantidad_asientos' => 'required|integer|min:1',
        ]);

        $reservaExistente = Reserva::where('dfecha', $this->dfecha)
            ->whereHas('detalleReserva', function ($query) {
                $query->where('numero_mesa', $this->numero_mesa);
            })
            ->exists();

        if ($reservaExistente) {
            $this->cerrarCreateModal();
            session()->flash('error', 'Ya existe una reserva para esta mesa en la fecha seleccionada.');
            return;
        }

        $this->ccodigo_verificacion = $this->generarCodigoVerificacion();

        $reserva = Reserva::create([
            'ccodigo_verificacion' => $this->ccodigo_verificacion,
            'dfecha' => $this->dfecha,
            'dhora' => $this->dhora,
            'duracion_reserva' => $this->duracion_reserva,
            'estado' => $this->estado
        ]);

        DetalleReserva::create([
            'nnumero_reserva' => $reserva->nnumero_reserva,
            'id_usuario' => $this->id_usuario,
            'numero_mesa' => $this->numero_mesa,
            'cantidad_asientos' => $this->cantidad_asientos,
        ]);

        session()->flash('message', 'Reserva y su detalle creados exitosamente.');
        $this->cerrarCreateModal();
    }

    public function actualizar()
    {
        $this->validate([
            'dfecha' => 'required|date',
            'dhora' => 'required|date_format:H:i',
            'duracion_reserva' => 'nullable|integer',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'numero_mesa' => 'required|exists:mesas,numero_mesas',
            'id_usuario' => 'required|exists:users,id',
            'cantidad_asientos' => 'required|integer|min:1',
        ]);

        $reserva = Reserva::find($this->reservaId);
        if ($reserva) {
            $reserva->update([
                'ccodigo_verificacion' => $this->ccodigo_verificacion,
                'dfecha' => $this->dfecha,
                'dhora' => $this->dhora,
                'duracion_reserva' => $this->duracion_reserva,
                'estado' => $this->estado,
            ]);

            $detalle = DetalleReserva::where('nnumero_reserva', $this->reservaId)->first();
            if ($detalle) {
                $detalle->update([
                    'id_usuario' => $this->id_usuario,
                    'numero_mesa' => $this->numero_mesa,
                    'cantidad_asientos' => $this->cantidad_asientos,
                ]);
            }

            session()->flash('message', 'Reserva actualizada con éxito.');
            $this->cerrarEditModal();
        }
    }

    public function eliminar($nnumero_reserva)
    {
        Reserva::find($nnumero_reserva)->delete();
        session()->flash('message', 'Reserva eliminada con éxito.');
    }
}