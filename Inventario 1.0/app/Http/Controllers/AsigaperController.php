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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asigapers = Asigaper::paginate();

        return view('asigaper.index', compact('asigapers'))
            ->with('i', (request()->input('page', 1) - 1) * $asigapers->perPage());
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