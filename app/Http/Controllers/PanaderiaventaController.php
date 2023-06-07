<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panaderiaventa;
use App\Models\Panaderiaingreso;
use PDF;

class PanaderiaventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $panaderiaventas = Panaderiaventa::all();

        if($request->has('view_deleted')){
            $panaderiaventas = Panaderiaventa::onlyTrashed()->get();
        }

        return view('panaderiaventa.index')->with('panaderiaventas', $panaderiaventas);
    }

    //generar pdf
    public function pdf()
    {
        $panaderiaventas = Panaderiaventa::all();

        $pdf = PDF::loadView('panaderiaventa.pdf', compact('panaderiaventas'));
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        //return view('panaderiaventa.pdf', compact('panaderiaventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $panaderiaingreso = Panaderiaingreso::all();
        return view('panaderiaventa.create',compact('panaderiaingreso'));
        //return view('panaderiaventa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $cantidad = $request->input('cantidad');

        $panaderiaingreso = Panaderiaingreso::find($id);

        if($cantidad <= $panaderiaingreso->cantidad)
        {
            $panaderiaingreso->cantidad = $panaderiaingreso->cantidad - $cantidad;

            $panaderiaingreso->update();
        
            $panaderiaventas = new Panaderiaventa();

            $panaderiaventas->tipo = $panaderiaingreso->tipo;
            $panaderiaventas->cantidad = $request->get('cantidad');
            $panaderiaventas->precio = $request->get('precio');

            $panaderiaventas->save();
        }

        return redirect('/panaderiaventas');
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
        $panaderiaventa = Panaderiaventa::find($id);
        return view('panaderiaventa.edit')->with('panaderiaventa', $panaderiaventa);
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
        $panaderiaventa = Panaderiaventa::find($id);

        $panaderiaventa->tipo = $request->get('tipo');
        $panaderiaventa->cantidad = $request->get('cantidad');
        $panaderiaventa->precio = $request->get('precio');

        $panaderiaventa->save();

        return redirect('/panaderiaventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id)
    {
        Panaderiaventa::withTrashed()->find($id)->restore();

        return back()->with('success', 'Se ha restaurado el producto');
    }

    public function forceDelete($id)
    {
        Panaderiaventa::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Se ha restaurado el producto');
    }

    public function destroy($id)
    {
        $panaderiaventa = Panaderiaventa::find($id);
        $panaderiaventa->delete();

        return redirect('/panaderiaventas');
    }
}
