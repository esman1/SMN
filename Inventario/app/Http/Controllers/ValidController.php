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
}

