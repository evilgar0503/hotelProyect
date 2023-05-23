<?php

namespace App\Http\Livewire;

use App\Models\Reservas;
use Livewire\Component;

class ReservasControl extends Component
{
    public $buscador = '';
    public function render()
    {
        $reservas = null;
        $reservas = Reservas::select(['habitaciones.*', 'reservas.*', 'users.nombre AS user_name', 'users.apellidos AS user_apellido'])
            ->join('habitaciones', 'reservas.habitacion_id', '=', 'habitaciones.id')
            ->join('users', 'reservas.user_id', '=', 'users.id')
            ->where('users.nombre', 'like', '%' . $this->buscador . '%')
            ->paginate(8);
        return view('livewire.reservas-control')->with("reservas", $reservas);
    }
}
