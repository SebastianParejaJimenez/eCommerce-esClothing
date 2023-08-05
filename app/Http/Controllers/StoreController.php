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

    public function carrito(Request $request){
        return view('pages/store/carrito');

    }
}
