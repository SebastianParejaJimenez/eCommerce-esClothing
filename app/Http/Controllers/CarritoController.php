<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Producto;
use App\Models\Orden;
use App\Models\OrdenProducto;


class CarritoController extends Controller
{
    public function agregaritem(Request $request){

        $producto = Producto::find($request->producto_id);

        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'qty' => 1,
            'weight' => 1,
            'options' => [
                'urlfoto' => $producto->imagen,
                'categoria' => $producto->categoria,
            ]
            ]);
            return redirect()->back()->with("success", "Producto agg");
    }
    public function vercarrito(Request $request){
        return view('pages/store/carrito');

    }

    public function incrementarCantidad(Request $request, $id){

        $item = Cart::content()->where("rowId",$request->id)->first();
        Cart::update($request->id,["qty"=>$item->qty+1]);
        return redirect()->back()->with("success", "Producto updated");


    }
    public function decrementarCantidad(Request $request, $id){

        $item = Cart::content()->where("rowId",$request->id)->first();
        Cart::update($request->id,["qty"=>$item->qty-1]);
        return redirect()->back()->with("success", "Producto updated");


    }

    public function eliminarItem(Request $request){
        Cart::remove($request->id);
        return redirect()->back()->with("success", "Producto updated");

    }

    public function eliminarCarrito(Request $request){
        Cart::destroy();
        return redirect()->back()->with("success", "carrito eliminao");

    }

    public function confirmarCarrito(Request $request){

        $orden = new Orden();

        $orden->subtotal = str_replace(',', '',Cart::subtotal());
        $orden->iva =  str_replace(',', '', Cart::tax());
        $orden->total = str_replace(',', '',  Cart::total());
        $orden->user_id = auth()->user()->id;
        $orden->save();
        foreach(Cart::content() as $item){
            $orden_productos = new OrdenProducto();
            $orden_productos->precio = $item->price;
            $orden_productos->cantidad = $item->qty;
            $orden_productos->producto_id = $item->id;
            $orden_productos->orden_id = $orden->id;
            $orden_productos->save();

        }

        Cart::destroy();
        return redirect()->back()->with("success", "confirmado");

    }


    public function session(){

        $productItems = [];
        $user         = auth()->user();
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach(Cart::content() as $item){
            $product_name =  $item->name;
            $total = $item->price;
            $quantity = $item->qty;

            $two = "00";
            $unit_amount = "$total$two";
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name'=> $product_name,
                    ],
                    'currency' => 'USD',
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity

            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => [$productItems],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'metadata' => [
                'user_id' => $user->id
            ],
            'customer_email' => $user->email,
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function cancel(){
        return redirect()->back()->with("canceled", "cancelado");
    }

}
