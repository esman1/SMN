<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

/**
 * Class SucursalController
 * @package App\Http\Controllers
 */
class SucursalController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-sucursal|edit-sucursal|delete-sucursal|show-sucursal', ['only' => ['index','show']]);
       $this->middleware('permission:create-sucursal', ['only' => ['create','store']]);
       $this->middleware('permission:edit-sucursal', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-sucursal', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursals = Sucursal::paginate();
        
        return view('sucursal.index',['sucursals' => Sucursal::latest('id_sucursal')->paginate(8)]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursal = new Sucursal();
        return view('sucursal.create', compact('sucursal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sucursal::$rules);

        $sucursal = Sucursal::create($request->all());

        return redirect()->route('sucursal.index')
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
        $sucursal = Sucursal::find($id);

        return view('sucursal.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal = Sucursal::find($id);

        return view('sucursal.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sucursal $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        request()->validate(Sucursal::$rules);

        $sucursal->update($request->all());

        return redirect()->route('sucursal.index')
            ->with('success', 'Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sucursal = Sucursal::find($id)->delete();

        return redirect()->route('sucursal.index')
            ->with('success', 'Eliminado Correctamente');
    }
}
