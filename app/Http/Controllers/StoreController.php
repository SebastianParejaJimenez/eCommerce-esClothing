<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class StoreController extends Controller
{
    //

    public function index(Request $request){


        $producto_randoms = Producto::inRandomOrder()
        ->limit(4)
        ->get();

        $productos_top  = Producto::inRandomOrder()
        ->limit(4)
        ->get();

        return view('pages/store/tienda', compact('producto_randoms', 'productos_top'));

    }

    public function catalogoVista(Request $request){

        $categoria = $request->categoria;
        $productos_categoria = Producto::where('categoria', $categoria)->paginate(12);
        $productoReciente = Producto::latest('created_at')->where('categoria', $categoria)->first();

        if (!$request->categoria) {
        $productos_categoria = Producto::paginate(12);
        $productoReciente = Producto::latest('created_at')->first();
        }

        return view('pages/store/catalogo', compact('productos_categoria', 'productoReciente'));

    }


}
