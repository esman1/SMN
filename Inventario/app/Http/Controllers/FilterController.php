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
                $items = Empleado::where('estatusv', 'no validado')->orderBy('Clave_empleado')->paginate(10);
                break;

            case 'stock':
                $items = Stock::where('estatusv', 'no validado')->paginate(10);
                break;

            case 'asigsuc':
                $items = Asigsuc::where('estatusv', 'no validado')->orderBy('id_asigsuc')->paginate(10);
                break;

            case 'asigaper':
                $items = Asigaper::where('estatusv', 'no validado')->orderBy('id_asigaper')->paginate(10);
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
            ->with('success', 'Actualizado Correctamente');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string|in:validado,no validado',
            'filter' => 'required|string|in:empleados,stock,asigaper,asigsuc',
        ]);

        switch ($request->filter) {
            case 'empleados':
                $item = Empleado::findOrFail($request->id);
                break;
            case 'stock':
                $item = Stock::findOrFail($request->id);
                break;
            case 'asigaper':
                $item = Asigaper::findOrFail($request->id);
                break;
            case 'asigsuc':
                $item = Asigsuc::findOrFail($request->id);
                break;
            default:
                abort(404);
        }

        $item->estatusv = $request->status;
        $item->save();

        return response()->json(['message' => 'Estado actualizado exitosamente']);
    }
}
