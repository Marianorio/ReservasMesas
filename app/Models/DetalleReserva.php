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
        'id_mesa',
        'cantidad_asientos',
    ];

    // Relación con el modelo Reserva (muchos detalles para una reserva)
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'nnumero_reserva', 'nnumero_reserva');
    }

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    // Relación con el modelo Mesa
    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'id_mesa', 'numero_mesas');
    }
}
