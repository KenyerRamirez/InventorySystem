<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panaderiaingreso;
use PDF;
use Illuminate\Validation\Rule;

class PanaderiaingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $panaderiaingresos = Panaderiaingreso::all();

        if($request->has('view_deleted')){
            $panaderiaingresos = Panaderiaingreso::onlyTrashed()->get();
        }

        return view('panaderiaingreso.index')->with('panaderiaingresos', $panaderiaingresos);
    }

    //generar pdf
    public function pdf()
    {
        $panaderiaingresos = Panaderiaingreso::all();

        $pdf = PDF::loadView('panaderiaingreso.pdf', compact('panaderiaingresos'));
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        //return view('panaderiaingreso.pdf', compact('panaderiaingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panaderiaingreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => ['required', 'max:50', Rule::unique('panaderiaingresos', 'tipo')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
        ]);


        $panaderiaingresos = new Panaderiaingreso();

        $panaderiaingresos->tipo = $request->get('tipo');
        $panaderiaingresos->cantidad = $request->get('cantidad');
        $panaderiaingresos->precio = $request->get('precio');

        $panaderiaingresos->save();

        return redirect('/panaderiaingresos');
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
        $panaderiaingreso = Panaderiaingreso::find($id);
        return view('panaderiaingreso.edit')->with('panaderiaingreso', $panaderiaingreso);
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
        $panaderiaingreso = Panaderiaingreso::find($id);

        $panaderiaingreso->tipo = $request->get('tipo');
        $panaderiaingreso->cantidad = $request->get('cantidad');
        $panaderiaingreso->precio = $request->get('precio');

        $panaderiaingreso->save();

        return redirect('/panaderiaingresos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id)
    {
        Panaderiaingreso::withTrashed()->find($id)->restore();

        return back()->with('success', 'Se ha restaurado el producto');
    }

    public function forceDelete($id)
    {
        Panaderiaingreso::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Se ha borrado permanentemente el producto');
    }

    public function destroy($id)
    {
        $panaderiaingreso = Panaderiaingreso::find($id);
        $panaderiaingreso->delete();
        return redirect('/panaderiaingresos');
    }
}
