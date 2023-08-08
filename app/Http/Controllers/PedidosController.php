<?php

namespace App\Http\Controllers;
use App\Models\DataFeed;
use App\Models\Orden; // Asegúrate de importar el modelo Orden

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function index(Request $request){
        $dataFeed = new DataFeed();
        $ordenes = Orden::with('productos', 'user')->get();

        return view('pages/pedidos/pedidos', compact('dataFeed', 'ordenes'));

    }
}
