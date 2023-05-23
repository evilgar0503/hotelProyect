<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserBuscador extends Component
{
    use WithPagination;
    public $usuario;
    public function render()
    {
        $usuarios = User::where('nombre', 'like', '%' . $this->usuario . '%')
        ->orWhere('apellidos', 'like', '%' . $this->usuario . '%')
        ->orWhere('dni', 'like', '%' . $this->usuario . '%')
        ->orWhere('email', 'like', '%' . $this->usuario . '%')
        ->paginate(7);

        return view('livewire.user-buscador')->with("usuarios", $usuarios);
    }
}
