<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReservasController extends Controller
{

    public function reservasByUser()
    {
        $usu = User::findOrFail(Auth::id());

        $reservas = Reservas::select(['reservas.*', 'habitaciones.nombre'])
            ->join('habitaciones', 'reservas.habitacion_id', '=', 'habitaciones.id')
            ->where('user_id', '=', $usu->id)
            ->get();


        return view('reservas')->with('reservas', $reservas);
    }

    public function comprobarFechas(Request $request)
    {
        /* Control Rango de Fechas Incorrectas */
        if (strtotime($request->fecha_entrada) >= strtotime($request->fecha_salida)) {
            $status = "El rango de fechas seleccionadas es inválida.";
            return view('busqueda')->with('status', $status);
        }

        $entrada = $request->fecha_entrada;
        $salida = $request->fecha_salida;

        $sql = "SELECT * from habitaciones where id not in (SELECT DISTINCT r.habitacion_id from habitaciones h, reservas r WHERE r.habitacion_id=h.id and ('" . $entrada . "' BETWEEN r.fecha_entrada and r.fecha_salida or '" . $salida . "' BETWEEN r.fecha_entrada and r.fecha_salida or r.fecha_entrada BETWEEN '. $entrada .' and '. $salida.' or  r.fecha_salida BETWEEN '" . $entrada . "' and '" . $salida . "') and r.deleted_at IS NULL); ";
        $habitacionesLibres = DB::select($sql);
        // var_dump($habitacionesLibres);

        return view('reservar')->with('habitaciones', $habitacionesLibres)->with('fecha_entrada', $entrada)->with('fecha_salida', $salida);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $habitacion = Habitacion::find($request->habitacion);
        $entrada = date_create($request->fecha_entrada);
        $salida = date_create($request->fecha_salida);
        $dias = date_diff($entrada, $salida);
        $total = $habitacion->precio * $dias->d;
        return view('finalizarReserva')->with('precio', $total)->with('habitacion', $habitacion)->with('fecha_entrada', $request->fecha_entrada)->with('fecha_salida', $request->fecha_salida);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reserva = new Reservas;

        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->habitacion_id = $request->habitacion;
        $reserva->user_id = Auth::id();
        $reserva->precio_total = $request->precio;
        $reserva->created_at = now();
        $reserva->save();
        // var_dump($reserva);

        return redirect()->route('misReservas');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $reservas = Reservas::select(['habitaciones.*', 'reservas.*','users.nombre AS user_name' , 'users.apellidos AS user_apellido'])
            ->join('habitaciones', 'reservas.habitacion_id', '=', 'habitaciones.id')
            ->join('users', 'reservas.user_id', '=', 'users.id')
            ->whereNull('reservas.deleted_at')
            ->get();
            // var_dump($reservas);
        return view('administrar.reservasUsuarios')->with('reservas', $reservas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        echo $request->id;
        $reserva = Reservas::findOrFail($request->id);
        $reserva->delete();
        return redirect()->back();
    }
}
