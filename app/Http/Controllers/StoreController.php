<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Carbon\Carbon;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //

    public function index(Request $request){


        $producto_randoms = Producto::where('estado', 'Activo')->inRandomOrder()
        ->limit(4)
        ->get();

        $productos_top  = Producto::where('estado', 'Activo')->inRandomOrder()
        ->limit(4)
        ->get();

        return view('pages/store/tienda', compact('producto_randoms', 'productos_top'));

    }

    public function catalogoVista(Request $request){

        $categoria = $request->categoria;
        $productos_categoria = Producto::where('categoria', $categoria)->where('estado', 'activo')->paginate(12);
        $productoReciente = Producto::latest('created_at')->where('categoria', $categoria)->where('estado', 'activo')->first();

        if (!$request->categoria) {
        $productos_categoria = Producto::where('estado', 'activo')->paginate(12);
        $productoReciente = Producto::latest('created_at')->where('estado', 'activo')->first();
        }

        return view('pages/store/catalogo', compact('productos_categoria', 'productoReciente'));

    }

    public function pedidos_hechos(){

        return view('pages/store/pedidos');
    }

}
