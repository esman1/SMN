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
use App\Models\Estatus;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $stocks = Stock::paginate();

        return view('stock.index', [
            'stocks' => Stock::latest('id_stock')->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stock = new Stock();
        $tipos = Tipo::all();
        $modelos = Modelo::all();
        $marcas = Marca::all();
        $sisops = Sisop::all();
        $proces =Procesador::all();
        $mems = Memoria::all();
        $discs = Discod::all();
        $estatus = Estatus::all();
        return view('stock.create', compact('stock', 'tipos', 'modelos','marcas','sisops','proces','mems','discs', 'estatus'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            'estatus_id' => 'required|exists:estatuses,id_estat',
        ]);
    
        $stock = new Stock();
    
        $stock->Nserie = $request->input('Nserie');
        $stock->modelo_id = $request->input('modelo_id');
        $stock->tipo_id = $request->input('tipo_id');
        $stock->marca_id = $request->input('marca_id');
        $stock->sisop_id = $request->input('sisop_id');
        $stock->proces_id = $request->input('proces_id');
        $stock->mem_id = $request->input('mem_id');
        $stock->disc_d = $request->input('disc_d');
        $stock->estatus_id = $request->input('estatus_id');
        $stock->estatusv = 'validado';
        $stock->save();
    
        return redirect()->route('stock.index')
            ->with('success', 'Registrado correctamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        $tipos = Tipo::all();
        $modelos = Modelo::all();
        $marcas = Marca::all();
        $sisops = Sisop::all();
        $proces =Procesador::all();
        $mems = Memoria::all();
        $discs = Discod::all();
        $estatus = Estatus::all();
        return view('stock.edit', compact('stock', 'tipos', 'modelos','marcas','sisops','proces','mems','discs','estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //dd($request->all());
          request()->validate ([
            'Nserie' => 'required|string|max:50', 
            'modelo_id' => 'required|exists:modelos,id_modelo',
            'tipo_id' => 'required|exists:tipos,id_tipo',
            'marca_id' => 'required|exists:marcas,id_marca',
            'sisop_id' => 'required|exists:sisops,id_sisop',
            'proces_id' => 'required|exists:procesadors,id_proc',
            'mem_id' => 'required|exists:memorias,id_mem',
            'disc_d' => 'required|exists:discods,id_disc',
            'estatus_id' => 'required|exists:estatuses,id_estat',

        ]);

        $stock =Stock::findOrFail($id);
   
        $stock -> Nserie = $request -> Nserie;
        $stock -> modelo_id = $request -> modelo_id;
        $stock -> tipo_id = $request -> tipo_id;
        $stock -> marca_id = $request -> marca_id;
        $stock -> sisop_id = $request -> sisop_id;
        $stock -> proces_id = $request -> proces_id;
        $stock -> mem_id = $request -> mem_id;
        $stock -> disc_d = $request -> disc_d;
        $stock -> estatus_id = $request -> estatus_id;
        $stock->estatusv = 'validado';
        $stock->save();

        return redirect()->route('stock.index')
            ->with('success', 'Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stock = Stock::find($id)->delete();

        return redirect()->route('stock.index')
            ->with('success', 'Eliminado Correctamente');
    }
}
