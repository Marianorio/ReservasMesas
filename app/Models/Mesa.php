<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    // Definir la clave primaria correcta
    protected $primaryKey = 'numero_mesas';
    public $incrementing = true;
    protected $keyType = 'bigint';

    // Atributos permitidos para asignación masiva
    protected $fillable = [
        'cantidad_asientos',
        'disponibilidad',
        'reservas_activas',
        'comentarios',
    ];

    // Relación con la tabla 'reservas' si corresponde
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'numero_mesas', 'numero_mesas');
    }
}
