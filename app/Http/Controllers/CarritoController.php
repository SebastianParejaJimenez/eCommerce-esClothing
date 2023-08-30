<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Producto;
use App\Models\Orden;
use App\Models\OrdenProducto;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CarritoController extends Controller
{
    public function agregaritem(Request $request)
    {

        $producto = Producto::find($request->producto_id);
        if (!$request->talla) {
           return redirect()->back()->with('error', 'talla');
        }
        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'qty' => 1,
            'weight' => 1,
            'options' => [
                'urlfoto' => $producto->imagen,
                'categoria' => $producto->categoria,
                'talla' => $request->talla,
            ]
        ]);
        return redirect()->back()->with("agregaritem", "Producto agg");
    }
    public function vercarrito(Request $request)
    {
        return view('pages/store/carrito');
    }

    public function incrementarCantidad(Request $request, $id)
    {

        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($request->id, ["qty" => $item->qty + 1]);
        return redirect()->back()->with("incrementarCantidad", "Producto updated");
    }
    public function decrementarCantidad(Request $request, $id)
    {

        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($request->id, ["qty" => $item->qty - 1]);
        return redirect()->back()->with("decrementarCantidad", "Producto updated");
    }

    public function eliminarItem(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->back()->with("eliminarItem", "Producto updated");
    }

    public function eliminarCarrito(Request $request)
    {
        Cart::destroy();
        return redirect()->back()->with("eliminarCarrito", "carrito eliminao");
    }

    public function confirmarCarrito(Request $request)
    {

        $orden = new Orden();

        $orden->subtotal = str_replace(',', '', Cart::subtotal());
        $orden->user_id = auth()->user()->id;
        $orden->save();
        dd(Cart::content());
        foreach (Cart::content() as $item) {


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


    public function session()
    {


        $productItems = [];
        $user         = auth()->user();
        $curl = new \Stripe\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
        \Stripe\ApiRequestor::setHttpClient($curl);


        \Stripe\Stripe::setVerifySslCerts(false);
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach (Cart::content() as $item) {
            $product_name =  $item->name;
            $total = $item->price;
            $quantity = $item->qty;
            $two = "00";
            $unit_amount = "$total$two";
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
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
            'success_url' => route('success')."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel'),
        ]);



        $orden = new Orden();
        $orden->guardarCarritoNoPagado($checkoutSession->id);


        return redirect()->away($checkoutSession->url);

    }
    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if(!$session){
                throw new NotFoundHttpException;
            }
            $orden = Orden::where('session_id', $session->id)->first();
            if (!$orden) {
                throw new NotFoundHttpException;
            }

            if ($orden->estado == "PENDIENTE") {
                    $orden->estado = "PAGADO";
                    $orden->save();
            }

        } catch (\Throwable $th) {
            throw new NotFoundHttpException();
        }

        return redirect()->back()->with("success", "success");
    }
    public function cancel()
    {
        return redirect()->back()->with("canceled", "cancelado");
    }
}
