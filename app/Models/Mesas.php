<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    use HasFactory;
    protected $fillable= ['numero_mesas', 'cantidad_asientos', 'disponibilidad', 'reservas_activas', 'comentarios'];
}
