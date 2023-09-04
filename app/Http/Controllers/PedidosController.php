<?php

namespace App\Http\Controllers;
use App\Models\DataFeed;
use App\Models\Orden; // Asegúrate de importar el modelo Orden
use Carbon\Carbon;
use Illuminate\Support\Facades\Toastr;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function index(Request $request){
        $dataFeed = new DataFeed();
        $ordenes = Orden::with('productos', 'user')->paginate(10);
        Carbon::setLocale('es');

        return view('pages/pedidos/pedidos', compact('dataFeed', 'ordenes'));

    }

    public function show(Request $request, $id){

        $pedido = Orden::findOrFail($id)
        ->with('productos', 'user')->where('id', $id)->get();


        return view('pages/pedidos/detalles', compact('pedido'));


    }

    public function updateEstado($id, $estado){

        $pedido = Orden::findOrFail($id);
        $pedido->estado = $estado;
        $pedido->save();

        return response()->json(['success' => true]);
    }
}
