<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusEvent;
use App\Models\Orden; // Asegúrate de importar el modelo Orden
use Carbon\Carbon;
use Illuminate\Support\Facades\Toastr;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function index(Request $request){
        $ordenes = Orden::with('productos', 'user')->paginate(10);

        return view('pages/pedidos/pedidos', compact( 'ordenes'));

    }

    public function show(Request $request, $id){

        $pedido = Orden::findOrFail($id)
        ->with('productos', 'user')->where('id', $id)->get();


        return view('pages/pedidos/detalles', compact('pedido'));


    }

    public function updateEstado($id, $estado){
        $orden = Orden::findOrFail($id);
        $orden->estado = $estado;
        $orden->save();

        self::ordenStatusMakeNotification($orden);

        return response()->json(['success' => true]);
    }


    static function ordenStatusMakeNotification($orden)
    {
        //Ejemplo para conocer si las notificaciones llegan a bd o no
        /*         User::where('rol_id', 1)
        ->each(function(User $user) use ($orden){
            $user->notify(new OrdenNotification($orden));
        }); */
        event(new OrderStatusEvent($orden));
    }

}
