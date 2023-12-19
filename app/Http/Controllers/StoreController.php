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

        $productos_activos = Producto::with(['tallas'])->get();

        foreach($productos_activos as $producto){
            $product = Producto::find($producto->id);
            if($product->cantidad <= 0 && $product->estado != "Inactivo"){
                $product->estado = "Inactivo";
                $product->save();
            }
        }

        $categoria = $request->categoria;

        $productos_categoria = Producto::with(['tallas'])->where('categoria', $categoria)->where('estado', 'activo')->paginate(12);

        $productos_talla_s = Producto::with(['tallas'])->whereHas('tallas', function ($query) {
            $query->where('talla', "S");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
            return $query->where('categoria', $categoria);
        })->paginate(12);

        $productos_talla_m = Producto::with(['tallas'])->whereHas('tallas', function ($query) {
            $query->where('talla', "M");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
            return $query->where('categoria', $categoria);
        })->paginate(12);

        $productos_talla_l = Producto::with(['tallas'])->whereHas('tallas', function ($query) {
            $query->where('talla', "L");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
            return $query->where('categoria', $categoria);
        })->paginate(12);

        $productos_talla_xl = Producto::with(['tallas'])->whereHas('tallas', function ($query) {
            $query->where('talla', "XL");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
        return $query->where('categoria', $categoria);
        })->paginate(12);


        $productoReciente = Producto::with(['tallas'])->latest('created_at')->where('categoria', $categoria)->where('estado', 'activo')->first();

        $productoRecienteS = Producto::with(['tallas'])->latest('created_at')->whereHas('tallas', function ($query) {
            $query->where('talla', "S");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
        return $query->where('categoria', $categoria);
        })->first();

        $productoRecienteM = Producto::with(['tallas'])->latest('created_at')->whereHas('tallas', function ($query) {
            $query->where('talla', "M");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
        return $query->where('categoria', $categoria);
        })->first();

        $productoRecienteL = Producto::with(['tallas'])->latest('created_at')->whereHas('tallas', function ($query) {
            $query->where('talla', "L");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
        return $query->where('categoria', $categoria);
        })->first();

        $productoRecienteXL = Producto::with(['tallas'])->latest('created_at')->whereHas('tallas', function ($query) {
            $query->where('talla', "XL");
        })->where('estado', 'activo')->when($categoria, function ($query, $categoria) {
        return $query->where('categoria', $categoria);
        })->first();

        if (!$request->categoria) {
            $productos_categoria = Producto::with(['tallas'])->where('estado', 'activo')->paginate(12);
            $productoReciente = Producto::with(['tallas'])->latest('created_at')->where('estado', 'activo')->first();
        }

        return view('pages/store/catalogo', compact('productos_categoria', 'productoReciente', 'productos_talla_s', 'productos_talla_m', 'productos_talla_l', 'productos_talla_xl', 'productoRecienteXL', 'productoRecienteL', 'productoRecienteM', 'productoRecienteS'));
    }

    public function pedidos_hechos()
    {
        $user_id = Auth::user()->id;
        $buscarPedido = false;

        $pedidos = Orden::with('productos', 'user')->where('user_id', $user_id)->orderByDesc('created_at')->paginate(8);


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
