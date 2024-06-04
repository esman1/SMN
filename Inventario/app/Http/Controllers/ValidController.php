<?
namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Stock;
use App\Models\AsigSuc;
use App\Models\AsigAper;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $items = collect(); // Initialize an empty collection

        switch ($filter) {
            case 'empleados':
                $items = Empleado::paginate();
                break;

            case 'stock':
                $items = Stock::paginate();
                break;

            case 'asigsuc':
                $items = AsigSuc::paginate();
                break;

            case 'asigaper':
                $items = AsigAper::paginate();
                break;

            default:
                // No filter or default filter logic, you can load a default table or show nothing
                break;
        }

        return view('filter.index', compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * $items->perPage());
    }

     

    public function show($id)
    {
        $filter = request()->get('filter');
    
        switch ($filter) {
            case 'empleados':
                $data = Empleado::findOrFail($id);
                return view('empleados.show', compact('data'));
    
            case 'stock':
                $data = Stock::findOrFail($id);
                return view('stock.show', compact('data'));
    
            case 'asigaper':
                $data = Asigaper::findOrFail($id);
                return view('asigaper.show', compact('data'));
    
            case 'asigsuc':
                $data = Asigsuc::findOrFail($id);
                return view('asigsuc.show', compact('data'));
    
            default:
                abort(404);
        }
    }

}

