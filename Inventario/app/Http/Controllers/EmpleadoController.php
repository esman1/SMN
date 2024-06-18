<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Departamento;
use App\Models\Sucursal;
use App\Models\Estatus;

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
        
        return view('empleado.create', compact('empleado', 'puestos', 'departamentos', 'sucursales', 'estatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    dd($request->all());

    $request->validate([
        'Clave_empleado' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'apellidoP' => 'required|string|max:255',
        'apellidoM' => 'required|string|max:255',
        'email' => 'nullable|string|email|max:255',
        'celular' => 'nullable|string|max:20',
        'foto_emple' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'puesto_id' => 'required|exists:puestos,id_puesto',
        'departamento_id' => 'required|exists:departamentos,id_depart',
        'sucursal_id' => 'required|exists:sucursals,id_sucursal',
        'estatus_id' => 'required|exists:estatuses,id_estat',
        'fecha_contrat' => 'required|date',
        'fecha_alta' => 'nullable|date',
       
    ]);

    $empleado = new Empleado();
    $empleado->Clave_empleado = $request->Clave_empleado;
    $empleado->nombre = $request->nombre;
    $empleado->apellidoP = $request->apellidoP;
    $empleado->apellidoM = $request->apellidoM;
    $empleado->email = $request->email;
    $empleado->celular = $request->celular;
    $empleado->puesto_id = $request->puesto_id;
    $empleado->departamento_id = $request->departamento_id;
    $empleado->sucursal_id = $request->sucursal_id;
    $empleado->estatus_id = $request->estatus_id;
    $empleado->fecha_contrat = $request->fecha_contrat;
    $empleado->fecha_alta = $request->fecha_alta;
    
    $empleado->estatusv = 'validado';
    // Guardar imagen si se ha proporcionado
    if ($request->hasFile('foto_emple')) {
        $image = $request->file('foto_emple');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('imagen'), $imageName);
        $empleado->foto_emple = $imageName;
    }

    $empleado->save();

    return redirect()->route('empleado.index')->with('success', 'Empleado creado exitosamente.');
}


 

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);

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
        $empleado = Empleado::findOrFail($id);
        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        $sucursales = Sucursal::all();
        $estatus = Estatus::all();
        
        return view('empleado.edit', compact('empleado', 'puestos', 'departamentos', 'sucursales', 'estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
        'Clave_empleado' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'apellidoP' => 'required|string|max:255',
        'apellidoM' => 'required|string|max:255',
        'email' => 'nullable|string|email|max:255',
        'celular' => 'nullable|string|max:20',
        'foto_emple' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'puesto_id' => 'required|exists:puestos,id_puesto',
        'departamento_id' => 'required|exists:departamentos,id_depart',
        'sucursal_id' => 'required|exists:sucursals,id_sucursal',
        'estatus_id' => 'required|exists:estatuses,id_estat',
       
        'fecha_baja' => 'nullable|date',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->Clave_empleado = $request->Clave_empleado;
        $empleado->nombre = $request->nombre;
        $empleado->apellidoP = $request->apellidoP;
        $empleado->apellidoM = $request->apellidoM;
        $empleado->email = $request->email;
        $empleado->celular = $request->celular;
        $empleado->puesto_id = $request->puesto_id;
        $empleado->departamento_id = $request->departamento_id;
        $empleado->sucursal_id = $request->sucursal_id;
        $empleado->estatus_id = $request->estatus_id;
        $empleado->fecha_baja = $request->fecha_baja;
        $empleado->estatusv = 'validado';

        // Guardar nueva imagen si se ha proporcionado
        if ($request->hasFile('foto_emple')) {
            $image = $request->file('foto_emple');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imagen'), $imageName);
            $empleado->foto_emple = $imageName;
        }

        $empleado->save();

        return redirect()->route('empleado.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado exitosamente.');
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

