<?php

namespace App\Http\Controllers;

use App\Models\Stock;
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

        return view('stock.index', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = new Stock();
        return view('stock.create', compact('stock'));
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

        return view('stock.edit', compact('stock'));
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