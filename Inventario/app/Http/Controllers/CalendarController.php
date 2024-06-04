<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CalendarController extends Controller
{
    /**
     * Muestra la vista del calendario.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('calendar.index');
    }

    /**
     * Obtiene todos los eventos y los devuelve en un formato compatible con FullCalendar.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function eventos()
    {
        $eventos = Evento::all();

        $data = [];

        foreach ($eventos as $evento) {
            $data[] = [
                'title' => $evento->titulo,
                'start' => $evento->fecha_inicio,
                'end' => $evento->fecha_fin,
                // Puedes agregar más campos según sea necesario
            ];
        }

        return response()->json($data);
    }
}
