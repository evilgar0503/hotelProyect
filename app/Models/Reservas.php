<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reservas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha_entrada',
        'fecha_salida',
        'user_id',
        'habitacion_id',
        'precio_total',
        'created_at'
    ];
}
