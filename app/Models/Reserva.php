<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'nnumero_reserva';

    protected $fillable = [
        'nnumero_reserva',
        'ccodigo_verificacion',
        'dfecha',
        'dhora',
        'duracion_reserva',
        'estado'
    ];

    // Relación con DetalleReserva
    public function detalleReserva()
    {
        return $this->hasOne(DetalleReserva::class, 'nnumero_reserva', 'nnumero_reserva');
    }


}
