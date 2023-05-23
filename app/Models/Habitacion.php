<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habitacion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'habitaciones';

    public function reservas() {
        return $this->belongsToMany(User::class, 'reservas')->withPivot('fecha_entrada','fecha_salida', 'precio_total', 'id', 'created_at');
    }

}
