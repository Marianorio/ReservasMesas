<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'nnumero_reserva',
        'ccodigo_verificacion',
        'dfecha',
        'dhora',
        'duracion_reserva',
        'estado'
    ];

   

}
