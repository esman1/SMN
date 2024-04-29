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
        return view('stock.create', compact('stock', 'tipos', 'modelos','marcas','sisops','proces','mems','discs'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Stock::$rules);

        $stock = Stock::create($request->all());

        return redirect()->route('stock.index')
            ->with('success', 'Registrado Correctamente.');
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
        return view('stock.edit', compact('stock', 'tipos', 'modelos','marcas','sisops','proces','mems','discs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        request()->validate(Stock::$rules);

        $stock->update($request->all());

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
