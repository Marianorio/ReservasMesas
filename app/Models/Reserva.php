<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';  // Nombre de la tabla en la base de datos

    protected $primaryKey = 'nnumero_reserva';  // Llave primaria de la tabla

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'ccodigo_verificacion',
        'dfecha',
        'dhora'
    ];
    
    // Una reserva pertenece a una mesa
    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    // Una reserva pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;  // Si no tienes columnas 'created_at' o 'updated_at'
}
