<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

/**
 * Class PuestoController
 * @package App\Http\Controllers
 */
class PuestoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-puesto|edit-puesto|delete-puesto|show-puesto', ['only' => ['index','show']]);
       $this->middleware('permission:create-puesto', ['only' => ['create','store']]);
       $this->middleware('permission:edit-puesto', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-puesto', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::orderBy("Clave_puesto")->paginate(6);

        return view('puesto.index', ['puestos' => $puestos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puesto = new Puesto();
        return view('puesto.create', compact('puesto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    request()->validate(Empleado::$rules);

    $empleadoData = $request->only([
        'Clave_empleado', 'nombre', 'apellidoP', 'apellidoM', 
        'email', 'celular', 'foto_emple', 'puesto_id', 
        'departamento_id', 'sucursal_id', 'estatus_id', 
        'fecha_contrat', 'fecha_alta', 'fecha_baja'
    ]); 

    $empleado = Empleado::create($empleadoData); 

    return redirect()->route('empleado.index')
        ->with('success', 'Creado Exitosamente');
}
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puesto = Puesto::find($id);

        return view('puesto.show', compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = Puesto::find($id);

        return view('puesto.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Puesto $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        request()->validate(Puesto::$rules);

        $puesto->update($request->all());

        return redirect()->route('puesto.index')
            ->with('success', 'Se actualizo Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id_puesto)
    {
        $puesto = Puesto::find($id_puesto)->delete();

        return redirect()->route('puesto.index')
            ->with('success', 'Eliminado Correctamente');
    }
}
