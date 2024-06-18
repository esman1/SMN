<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Tipo;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Sisop;
use App\Models\Procesador;
use App\Models\Memoria;
use App\Models\Discod;
use Illuminate\Http\Request;

/**
 * Class StockController
 * @package App\Http\Controllers
 */
class StockController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-stock|edit-stock|delete-stock|show-stock', ['only' => ['index','show']]);
       $this->middleware('permission:create-stock', ['only' => ['create','store']]);
       $this->middleware('permission:edit-stock', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-stock', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('stock.index', [
            'stocks' => Stock::latest('id_stock')->paginate(6)
        ]);
    }

    public function create()
    {
        return view('stock.create', [
            'stock' => new Stock(),
            'tipos' => Tipo::all(),
            'modelos' => Modelo::all(),
            'marcas' => Marca::all(),
            'sisops' => Sisop::all(),
            'proces' => Procesador::all(),
            'mems' => Memoria::all(),
            'discs' => Discod::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nserie' => 'required|string|max:50',
            'modelo_id' => 'required|exists:modelos,id_modelo',
            'tipo_id' => 'required|exists:tipos,id_tipo',
            'marca_id' => 'required|exists:marcas,id_marca',
            'sisop_id' => 'required|exists:sisops,id_sisop',
            'proces_id' => 'required|exists:procesadors,id_proc',
            'mem_id' => 'required|exists:memorias,id_mem',
            'disc_d' => 'required|exists:discods,id_disc',
            'estatus' => 'required|string|max:12'
        ]);

        $stock = new Stock();
        $stock->Nserie = $request->Nserie;
        $stock->modelo_id = $request->modelo_id;
        $stock->tipo_id = $request->tipo_id;
        $stock->marca_id = $request->marca_id;
        $stock->sisop_id = $request->sisop_id;
        $stock->proces_id = $request->proces_id;
        $stock->mem_id = $request->mem_id;
        $stock->disc_d = $request->disc_d;
        $stock->estatus = $request->estatus;
        $stock->estatusv = 'validado';
        $stock->save();

        return redirect()->route('stock.index')
            ->with('success', 'Registrado Correctamente.');
    }

    public function show($id)
    {
        $stock = Stock::findOrFail($id);

        return view('stock.show', compact('stock'));
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);

        return view('stock.edit', [
            'stock' => $stock,
            'tipos' => Tipo::all(),
            'modelos' => Modelo::all(),
            'marcas' => Marca::all(),
            'sisops' => Sisop::all(),
            'proces' => Procesador::all(),
            'mems' => Memoria::all(),
            'discs' => Discod::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nserie' => 'required|string|max:50',
            'modelo_id' => 'required|exists:modelos,id_modelo',
            'tipo_id' => 'required|exists:tipos,id_tipo',
            'marca_id' => 'required|exists:marcas,id_marca',
            'sisop_id' => 'required|exists:sisops,id_sisop',
            'proces_id' => 'required|exists:procesadors,id_proc',
            'mem_id' => 'required|exists:memorias,id_mem',
            'disc_d' => 'required|exists:discods,id_disc',
            'estatus' => 'required|string|max:12'
        ]);

        $stock = Stock::findOrFail($id);
        $stock->Nserie = $request->Nserie;
        $stock->modelo_id = $request->modelo_id;
        $stock->tipo_id = $request->tipo_id;
        $stock->marca_id = $request->marca_id;
        $stock->sisop_id = $request->sisop_id;
        $stock->proces_id = $request->proces_id;
        $stock->mem_id = $request->mem_id;
        $stock->disc_d = $request->disc_d;
        $stock->estatus = $request->estatus;
        $stock->estatusv = 'validado';
        $stock->save();

        return redirect()->route('stock.index')
            ->with('success', 'Actualizado Correctamente.');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('stock.index')
            ->with('success', 'Eliminado Correctamente');
    }
}
