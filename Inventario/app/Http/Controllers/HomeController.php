<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Stock;
use App\Models\AsigSuc;
use App\Models\AsigAper;
use App\Models\Departamento;
use App\Models\Sucursal;
use App\Models\Puesto;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $empleadosCount = Empleado::where('estatusv', 'validado')->count();
        $stockCount = Stock::where('estatusv', 'validado')->count();
        $asignarPersonalCount = AsigAper::where('estatusv', 'validado')->count();
        $departamentoCount = Departamento::count();
        $sucursalCount = Sucursal::count();
        $puestoCount = Puesto::count();
        $asignacionTiendaCount = AsigSuc::where('estatusv', 'validado')->count();
        $calendarioCount = Event::count();

        // Calcular el porcentaje de información validada
        $totalItems = Empleado::count() 
                    + Stock::count() 
                    + AsigSuc::count() 
                    + AsigAper::count();

        $validatedItems = $empleadosCount 
                        + $stockCount 
                        + $asignarPersonalCount 
                        + $asignacionTiendaCount;

                        $validacionPercentage = $totalItems > 0 ? number_format(($validatedItems / $totalItems) * 100, 2) : 0;


        return view('home', compact(
            'empleadosCount', 
            'stockCount', 
            'asignarPersonalCount', 
            'departamentoCount', 
            'sucursalCount', 
            'puestoCount', 
            'asignacionTiendaCount', 
            'validacionPercentage', 
            'calendarioCount'
        ));
    }
}
