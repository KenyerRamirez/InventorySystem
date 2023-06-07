<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novedade;
use PDF;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $novedades = Novedade::all();

        if($request->has('view_deleted')){
            $novedades = Novedade::onlyTrashed()->get();
        }

        return view('novedades.index')->with('novedades', $novedades);    
    }

    public function pdf()
    {
        $novedades = Novedade::all();

        $pdf = PDF::loadView('novedades.pdf', compact('novedades'));
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->setPaper('a4', 'landscape')->stream();

        //return view('articulo.pdf', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novedades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novedades = new Novedade();

        $novedades->novedades = $request->get('novedades');

        $novedades->save();

        return redirect('/novedades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novedade = Novedade::find($id);
        return view('novedades.edit')->with('novedade', $novedade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $novedade = Novedade::find($id);

        $novedade->novedades = $request->get('novedades');

        $novedade->save();

        return redirect('/novedades');
    }

    public function restore($id)
    {
        Novedade::withTrashed()->find($id)->restore();

        return back()->with('success', 'Se ha restaurado la novedad');
    }

    public function forceDelete($id)
    {
        Novedade::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Se ha eliminado permanentemente la novedad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novedade = Novedade::find($id);
        $novedade->delete();
        return redirect('/novedades');
    }
}
