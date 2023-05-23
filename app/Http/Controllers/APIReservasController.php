<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiReservasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApiReservasRequest $request)
    {
        $entrada = $request->fecha_entrada;
        $salida = $request->fecha_salida;
        
        $sql = "SELECT * from habitaciones where id not in (SELECT DISTINCT r.habitacion_id from habitaciones h, reservas r WHERE r.habitacion_id=h.id and ('" . $entrada . "' BETWEEN r.fecha_entrada and r.fecha_salida or '" . $salida . "' BETWEEN r.fecha_entrada and r.fecha_salida or r.fecha_entrada BETWEEN '. $entrada .' and '. $salida.' or  r.fecha_salida BETWEEN '" . $entrada . "' and '" . $salida . "') and r.deleted_at IS NULL); ";
        $habitacionesLibres = DB::select($sql);
        return response()->json([
            'status' => true,
            'habitacionesLibres' => $habitacionesLibres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
