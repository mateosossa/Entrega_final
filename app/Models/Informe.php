<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomina_id',
        'user_id',
        'nombre_usuario',
        'fecha_realizacion',
        'monto_nomina',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function nomina()
    {
        return $this->belongsTo(Nomina::class, 'nomina_id');
    }
}
