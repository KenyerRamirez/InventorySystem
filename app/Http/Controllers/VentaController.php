<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;


// ten en cuenta que use el comando --resource para que me creara los metodos automaticamente
// yo quite los otros metodos para solo dejarle lo necesario
// no es obligatorio crear el controlador con resource, es solo un ejemplo

class VentaController extends Controller
{
   
    public function store(Request $request)
    {
       
       $id_producto = $request->input('id_producto'); // debes enviar el id del producto
       $cantidad = $request->input('cantidad'); // cantidad de producto

        // primero creamos la venta
        // los campos que indico alli son solo un ejemplo, a exepcion del id_producto y cantidad
        $venta = new Venta;
        $venta->producto = $id_producto;
        $venta->cantidad = $cantidad;
        $venta->precio = $request->input('precio');
        $venta->save();

        // buscamos en nuestra base de datos el producto con tal Id
        $producto = Producto::find($id_producto);
        // de esta forma restamos el stock de nuestros productos
        $producto->stock = $producto->stock - $cantidad;
        // actualizamos el producto
        $producto->update();
     
    }

 
}
