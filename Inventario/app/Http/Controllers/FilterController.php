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
        $items = null;

        switch ($filter) {
            case 'empleados':
                $items = Empleado::orderBy('Clave_empleado')->paginate(10);
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
                $items = null; 
                break;
        }

        return view('filter.index', compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * ($items ? $items->perPage() : 0));
    }

    public function show($filter, $id)
    {
        $data = null;

        switch ($filter) {
            case 'empleados':
                $data = Empleado::findOrFail($id);
                break;
            case 'stock':
                $data = Stock::findOrFail($id);
                break;
            case 'asigaper':
                $data = Asigaper::findOrFail($id);
                break;
            case 'asigsuc':
                $data = Asigsuc::findOrFail($id);
                break;
            default:
                abort(404);
        }

        return view('filter.show', compact('data', 'filter'));
    }

    public function edit($id)
    {
        $modelo = Modelo::find($id);

        return view('modelo.edit', compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modelo $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        request()->validate(Modelo::$rules);

        $modelo->update($request->all());

        return redirect()->route('modelos.index')
            ->with('success', 'Modelo updated successfully');
    }
}
