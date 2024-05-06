<?php

namespace App\Http\Controllers;

use App\Models\Asigsuc;
use App\Models\Sucursal;
use App\Models\Stock;
use Illuminate\Http\Request;

/**
 * Class AsigaperController
 * @package App\Http\Controllers
 */
class AsigsucController extends Controller
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
        $asigsuc = Asigsuc::paginate();
      
        return view('asigsuc.index', [
            'asigsucs' => Asigsuc::latest('id_asigsuc')->paginate(6)
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
        request()->validate(Asigsuc::$rules);

        $asigaper = Asigsuc::create($request->all());

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
        $asigaper = Asigsuc::find($id);

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
        $asigaper = Asigsuc::find($id);
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
    public function update(Request $request, Asigsuc $asigaper)
    {
        $request()->validate(Asigsuc::$rules);

        $asigaper->update($request->all());

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
        $asigaper = Asigsuc::find($id)->delete();

        return redirect()->route('asigaper.index')
            ->with('success', 'Eliminado Correctamnte.');
    }
}
