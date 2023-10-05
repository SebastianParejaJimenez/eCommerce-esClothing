<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Carbon\Carbon;
use App\Models\Orden;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class StoreController extends Controller
{
    //

    public function index(Request $request)
    {


        $producto_randoms = Producto::with(['tallas'])->where('estado', 'Activo')->inRandomOrder()
            ->limit(4)
            ->get();

        $productos_top  = Producto::with(['tallas'])->where('estado', 'Activo')->inRandomOrder()
            ->limit(4)
            ->get();

        return view('pages/store/tienda', compact('producto_randoms', 'productos_top'));
    }

    public function catalogoVista(Request $request)
    {

        $categoria = $request->categoria;

        $productos_categoria = Producto::with(['tallas'])->where('categoria', $categoria)->where('estado', 'activo')->paginate(12);
        $productoReciente = Producto::with(['tallas'])->latest('created_at')->where('categoria', $categoria)->where('estado', 'activo')->first();

        if (!$request->categoria) {
            $productos_categoria = Producto::with(['tallas'])->where('estado', 'activo')->paginate(12);
            $productoReciente = Producto::with(['tallas'])->latest('created_at')->where('estado', 'activo')->first();
        }

        return view('pages/store/catalogo', compact('productos_categoria', 'productoReciente'));
    }

    public function pedidos_hechos()
    {
        $user_id = Auth::user()->id;
        $buscarPedido = false;

        $pedidos = Orden::with('productos', 'user')->where('user_id', $user_id)->orderByDesc('created_at')->paginate(2);


        return view('pages/store/pedidos', compact('pedidos', 'buscarPedido'));
    }


    public function buscarPedido(Request $request)
    {
        $user_id = Auth::user()->id;
        $buscarPedido = false;
        $idPedido = $request->input('id-pedido');

        $pedidos = Orden::with('productos', 'user')->where('user_id', $user_id)->orderByDesc('created_at')->paginate(2);

        $pedido = Orden::with('productos', 'user')->where('id', $idPedido)->where('user_id', $user_id)->first();

        if ($pedido) {
            $buscarPedido = true;
            return view('pages/store/pedidos', compact('pedido', 'pedidos', 'buscarPedido'));
        }
        return redirect()->route('pedidos_hechos')->with('error','not_found');




    }

    public function pdf($id)
    {
        $user_id = Auth::user()->id;

        $val = Orden::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        if($val){
            $pedido = Orden::findOrFail($id)->with('productos', 'user')->where('id', $id)->where('user_id', $user_id)->get();
            $pdf = Pdf::loadView('pages/store/detalle-pdf', compact('pedido'));
            $pdf->render();
            return $pdf->download('detalle_pedido.pdf');
        }else{
            return redirect()->back();
        }

    }
}
