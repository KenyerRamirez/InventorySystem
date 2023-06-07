<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use PDF;
use Illuminate\Validation\Rule;

class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articulos = Articulo::all();

        if($request->has('view_deleted')){
            $articulos = Articulo::onlyTrashed()->get();
        }

        return view('articulo.index')->with('articulos', $articulos);
    }

    //generar pdf
    public function pdf()
    {
        $articulos = Articulo::all();

        $pdf = PDF::loadView('articulo.pdf', compact('articulos'));
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        //return view('articulo.pdf', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
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
            'descripcion' => ['required', 'max:50', Rule::unique('articulos', 'descripcion')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
        ]);

        $articulos = new Articulo();

        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');

        $articulos->save();

        return redirect('/articulos');
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
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
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
        $articulo = Articulo::find($id);

        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id)
    {
        Articulo::withTrashed()->find($id)->restore();

        return back()->with('success', 'Se ha restaurado el producto');
    }

    public function forceDelete($id)
    {
        Articulo::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Se ha eliminado permanentemente el producto');
    }


    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }
}
