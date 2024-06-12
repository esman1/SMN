<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Departamento;
use App\Models\Sucursal;
use App\Models\Estatus;
use Illuminate\Http\Request;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-empleado|edit-empleado|delete-empleado|show-empleado', ['only' => ['index','show']]);
       $this->middleware('permission:create-empleado', ['only' => ['create','store']]);
       $this->middleware('permission:edit-empleado', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-empleado', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy("Clave_empleado")->paginate(9);

            return view('empleado.index', [
                'empleados' => $empleados
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        $sucursales = Sucursal::all();
        $estatus = Estatus::all();
        return view('empleado.create', compact('empleado','puestos','departamentos','sucursales', 'estatus'));
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

        $empleado = Empleado::create($request->all());

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
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $puestos = Puesto::All();
        $departamentos = Departamento::All();
        $sucursales = Sucursal::All();
        $estatus = Estatus::All();
        return view('empleado.edit', compact('empleado','puestos','departamentos','sucursales','estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        request()->validate(Empleado::$rules);

        $empleado->update($request->all());

        return redirect()->route('empleado.index')
            ->with('success', 'Actualizado Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return redirect()->route('empleado.index')
            ->with('success', 'Eliminado Exitosamente');
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
        \Log::info('Search query: ' . $query);
    
        $empleados = Empleado::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('apellidoP', 'LIKE', "%{$query}%")
            ->orWhere('apellidoM', 'LIKE', "%{$query}%")
            ->orWhere('Clave_empleado', 'LIKE', "%{$query}%")
            ->with(['puesto', 'departamento', 'sucursal'])
            ->get();
    
        \Log::info('Empleados found: ' . $empleados->count());
    
        return response()->json($empleados);
    }

    public function actualizarEstado(Request $request)
    {
        // Recibe el ID y el estado del checkbox del cliente
        $id = $request->input('id_emplead');
        $estado = $request->input('estatusv');

        // Actualiza el estado en la base de datos
        $dato = Empleado::find($id);
        $dato->estatusv = $estado;
        $dato->save();
        return redirect()->route('filter.index')
        ->with('success', 'Validado Exitosamente');
        
    }
}

