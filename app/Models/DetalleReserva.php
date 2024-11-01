<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    use HasFactory;

    // Definir la tabla si no sigue la convención de nombre en plural
    protected $table = 'detalle_reservas';

    // Habilitar el llenado masivo para los siguientes campos
    protected $fillable = [
        'nnumero_reserva',
        'id_usuario',
        'numero_mesa',
        'cantidad_asientos',
    ];

    // Relación con DetalleReserva (una reserva tiene un detalle)
    /* public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'nnumero_reserva', 'nnumero_reserva');
    } */

    // Relación con Mesa a través de DetalleReserva
    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'numero_mesa'); // Asegúrate de que los nombres de columnas sean correctos
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
