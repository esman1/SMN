<?php

namespace App\Http\Controllers;

use App\Models\Asigaper;
use App\Models\Empleado;
use App\Models\Stock;
use Illuminate\Http\Request;

/**
 * Class AsigaperController
 * @package App\Http\Controllers
 */
class AsigaperController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-asigaper|edit-asigaper|delete-asigaper|show-asigaper', ['only' => ['index','show']]);
       $this->middleware('permission:create-asigaper', ['only' => ['create','store']]);
       $this->middleware('permission:edit-asigaper', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-asigaper', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asigapers = Asigaper::paginate();
      
        return view('asigaper.index', [
            'asigapers' => Asigaper::latest('id_asigaper')->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asigaper = new Asigaper();
        $empleados = Empleado::All();
        $stocks = Stock::All();
        return view('asigaper.create', compact('asigaper','empleados','stocks'));
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
            'empleado_id' => 'required|exists:empleados,id_empleado',
            'stock_id' => 'required|exists:stocks,id_stock',
            'Nactivo' => 'required|string|max:50',
        ]);
    
        $asigaper = new Asigaper();
        $asigaper->empleado_id = $request->empleado_id;
        $asigaper->stock_id = $request->stock_id;
        $asigaper->Nactivo = $request->Nactivo;
        $asigaper->estatusv = 'validado';
        $asigaper->save();
    
        return redirect()->route('asigaper.index')
            ->with('success', 'Creado Correctamente.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asigaper = Asigaper::find($id);

        return view('asigaper.show', compact('asigaper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asigaper = Asigaper::find($id);
        $empleados = Empleado::All();
        $stocks = Stock::All();
        return view('asigaper.edit', compact('asigaper','empleados','stocks'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asigaper $asigaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $asigaper = Asigaper::findOrFail($id);
$asigaper-> empleado_id = $request->empleado_id;
$asigaper-> stock_id = $request->stock_id;
$asigaper->Nactivo = $request->Nactivo;
$asigaper->estatusv = 'validado';
$asigaper->save();
        return redirect()->route('asigaper.index')
            ->with('success', 'Actualizado Correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asigaper = Asigaper::find($id)->delete();

        return redirect()->route('asigaper.index')
            ->with('success', 'Eliminado Correctamnte.');
    }
}
