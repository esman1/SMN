<?php

namespace App\Http\Controllers;

use App\Models\Asigaper;
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
        return view('asigaper.create', compact('asigaper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asigaper::$rules);

        $asigaper = Asigaper::create($request->all());

        return redirect()->route('asigaper.index')
            ->with('success', 'Asigaper created successfully.');
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

        return view('asigaper.edit', compact('asigaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asigaper $asigaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asigaper $asigaper)
    {
        request()->validate(Asigaper::$rules);

        $asigaper->update($request->all());

        return redirect()->route('asigaper.index')
            ->with('success', 'Asigaper updated successfully');
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
            ->with('success', 'Asigaper deleted successfully');
    }
}
