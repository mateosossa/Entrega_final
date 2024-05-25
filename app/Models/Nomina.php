<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Asegúrate de importar el modelo User

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'horas_trabajadas',
        'valor_hora',
        'monto_nomina',
    ];

    // Definir la relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
