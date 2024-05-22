<?php
namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Stock;
use App\Models\Asigsuc;
use App\Models\Asigaper;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $items = null; // Inicializar como null

        switch ($filter) {
            case 'empleados':
                $items = Empleado::orderBy('Clave_empleado')->paginate(10); // Cambiar el 10 por la cantidad deseada por página
                break;

            case 'stock':
                $items = Stock::paginate(10);
                break;

            case 'asigsuc':
                $items = Asigsuc::orderBy('id_asigsuc')->paginate(10);
                break;

            case 'asigaper':
                $items = Asigaper::orderBy('id_asigaper')->paginate(10);
                break;

            default:
                // Si no hay filtro seleccionado, no mostrar nada
                $items = null; 
                break;
        }

        return view('filter.index', compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * ($items ? $items->perPage() : 0));
    }
}
