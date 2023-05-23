<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDFUser()
    {
        $users = User::get();

        $data = [
            'title' => 'Hotel Príncipe Pío',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('pdfs.PDFUser', $data);

        return $pdf->download('users.pdf');
    }


    public function generatePDFCompra(Request $request)
    {
        $reserva= Reservas::select(['habitaciones.*', 'reservas.*', 'users.nombre AS user_name', 'users.apellidos AS user_apellido', 'users.dni', 'users.email'])
        ->join('habitaciones', 'reservas.habitacion_id', '=', 'habitaciones.id')
        ->join('users', 'reservas.user_id', '=', 'users.id')
        ->where('reservas.id', '=', $request->id)
        ->get();

        $data = [
            'fecha' => date('m/d/Y'),
            'reserva' => $reserva
        ];

        $pdf = PDF::loadView('pdfs.PDFCompra', $data);

        return $pdf->download('factura00.pdf');
    }
}
