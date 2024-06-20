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
        //dd($request->all());
        $request->validate([
'nFol'=>'required|string|max:20',
'suc_id'=>'required|exists:sucursals,id_sucursal',
'area_id'=>'required|exists:areas,id_area',
'stock_id'=>'required|exists:stocks,id_stock',
'nAct'=>'required|string|max:15'

        ]);
       
        $asigsuc=new Asigsuc();
        $asigsuc->nfol = $request->nFol;
        $asigsuc->suc_id = $request->suc_id;
        $asigsuc->area_id = $request->area_id;
        $asigsuc->stock_id = $request->stock_id;
        $asigsuc->nAct = $request->nAct;
        $asigsuc->estatusv = 'validado';
        

        $asigsuc->save();

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
        $areas=Area::All();
        return view('asigsuc.edit', compact('asigsucs','sucursals','stocks', 'areas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asigaper $asigaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd($request->all());
        $request->validate([
            'nFol'=>'required|string|max:20',
            'suc_id'=>'required|exists:sucursals,id_sucursal',
            'area_id'=>'required|exists:areas,id_area',
            'stock_id'=>'required|exists:stocks,id_stock',
            'nAct'=>'required|string|max:15'
            
                    ]);
                   
                    $asigsuc=Asigsuc::findOrFail($id);
                    $asigsuc->nfol = $request->nFol;
                    $asigsuc->suc_id = $request->suc_id;
                    $asigsuc->area_id = $request->area_id;
                    $asigsuc->stock_id = $request->stock_id;
                    $asigsuc->nAct = $request->nAct;
                    $asigsuc->estatusv = 'validado';
                    
            
                    $asigsuc->save();
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
