<?php

namespace App\Http\Controllers;

use App\Models\Asigsuc;
use App\Models\Sucursal;
use App\Models\Stock;
use App\Models\Area;
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
       $this->middleware('permission:create-asigsuc|edit-asigsuc|delete-asigsuc|show-asigsuc', ['only' => ['index','show']]);
       $this->middleware('permission:create-asigsuc', ['only' => ['create','store']]);
       $this->middleware('permission:edit-asigsuc', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-asigsuc', ['only' => ['destroy']]);
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
        $asigsucs = new Asigsuc();
        $sucursals = Sucursal::All();
        $stocks = Stock::All();
        $areas = Area::All();
        return view('asigsuc.create', compact('asigsucs','sucursals','stocks','areas'));
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

        $asigsucs = Asigsuc::create($request->all());

        return redirect()->route('asigsuc.index')
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
        $asigsucs = Asigsuc::find($id);

        return view('asigsuc.show', compact('asigsucs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asigsucs = Asigsuc::find($id);
        $sucursals = Sucursal::All();
        $stocks = Stock::All();
        return view('asigsuc.edit', compact('asigsucs','sucursals','stocks'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asigaper $asigaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asigsuc $asigsucs)
    {
        $request()->validate(Asigsuc::$rules);

        $asigsucs->update($request->all());

        return redirect()->route('asigsuc.index')
            ->with('success', 'Actualizado Correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asigsucs = Asigsuc::find($id)->delete();

        return redirect()->route('asigsuc.index')
            ->with('success', 'Eliminado Correctamnte.');
    }
}
