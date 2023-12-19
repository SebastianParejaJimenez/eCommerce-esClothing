<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Producto;
use App\Models\Orden;
use App\Models\OrdenProducto;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;
use App\Events\OrdenEvent;
use App\Notifications\OrdenNotification;
use Exception;

class CarritoController extends Controller
{
    public function agregaritem(Request $request)
    {
        $producto = Producto::find($request->producto_id);
        if (!$request->talla) {
            return redirect()->back()->with('error', 'talla');
        }
        $producto_carrito = Cart::content()->where("id", $producto->id)->all();
        $cantidad_productos_carrito = 0;
        foreach ($producto_carrito as $producto_carrito) {
            $cantidad_productos_carrito += $producto_carrito->qty;
        }

        if($producto->cantidad > $cantidad_productos_carrito){
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
                'estado' => $request->estado,
            ]
        ]);
        $this->carritoProductosDisponibles();
        return redirect()->back()->with("agregaritem", "Producto agg");
        }else{
            return redirect()->back()->with("error_agregar_item", "error-cantidad");
        }

    }

    public function carritoProductosDisponibles()
    {
        foreach(Cart::content() as $cartContent){
            $product = Producto::find($cartContent->id);
            if($product->estado == "Inactivo" || $product->cantidad <= 0 || $product->cantidad < $cartContent->qty){
                Cart::remove($cartContent->rowId);
            }
        }
    }
    public function vercarrito(Request $request)
    {
        $this->carritoProductosDisponibles();
        return view('pages/store/carrito');
    }

    public function incrementarCantidad(Request $request, $id)
    {
        $item = Cart::content()->where("rowId", $request->id)->first();
        $product = Producto::find($item->id);

        $producto_carrito = Cart::content()->where("id", $product->id)->all();
        $cantidad_productos_carrito = 0;
        foreach ($producto_carrito as $producto_carrito) {
            $cantidad_productos_carrito += $producto_carrito->qty;
        }

        if($product->cantidad > $cantidad_productos_carrito){
            Cart::update($request->id, ["qty" => $item->qty + 1]);
            return redirect()->back()->with("incrementado", "Producto updated");

        }
        return redirect()->back()->with("no_incrementado", "Producto updated");
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

    public function guardarCarrito($session_id)
    {
        
        $orden = new Orden();
        $orden->subtotal = str_replace(',', '', Cart::subtotal());
        $orden->total = str_replace(',', '', Cart::total());

        $orden->user_id = auth()->user()->id;
        $orden->session_id = $session_id;
        $orden->ciudad_envio = auth()->user()->ciudad;
        $orden->codigo_postal = auth()->user()->codigo_postal;
        $orden->direccion_envio = auth()->user()->direccion;

        $orden->save();


        foreach (Cart::content() as $item) {
            $orden_productos = new OrdenProducto();
            $orden_productos->precio = $item->price;
            $orden_productos->cantidad = $item->qty;
            $orden_productos->producto_id = $item->id;
            $orden_productos->orden_id = $orden->id;
            $orden_productos->talla = $item->options->talla;

            $orden_productos->save();
        }

        foreach(Cart::content() as $producto){
            $product = Producto::find($producto->id);
            $product->cantidad -= $producto->qty;

            if($producto->cantidad <= 0 && $producto->estado != "Inactivo"){
                $producto->estado = "Inactivo";
            }

            $product->save();
        }
        self::ordenMakeNotification($orden);

    }

    static function ordenMakeNotification($orden)
    {

        //Ejemplo para conocer si las notificaciones llegan a bd o no
        /*         User::where('rol_id', 1)
        ->each(function(User $user) use ($orden){
            $user->notify(new OrdenNotification($orden));
        }); */

        event(new OrdenEvent($orden));

    }

    public function session()
    {
        $productItems = [];
        $user = auth()->user();
        $curl = new \Stripe\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
        \Stripe\ApiRequestor::setHttpClient($curl);
        \Stripe\Stripe::setVerifySslCerts(false);
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        /* $this->carritoProductosDisponibles(); */

        //Intentar mandar productos al stripe, sino sucede es porque no existen productos o ninguno esta disponible
        try{
            foreach (Cart::content() as $item) {
                $product = Producto::find($item->id);
                if($product->cantidad = $item->qty){
                    $product_name =  $item->name;
                    $total = $item->price;
                    $quantity = $item->qty;
                    $two = "00";
                    $unit_amount = "$total$two";
                    $productItems[] = [
                        'price_data' => [
                            'product_data' => [
                                'name' => $product_name,
                                'metadata' => [
                                    'talla_elegida' => $item->options->talla,
                                    'imagen' => $item->options->urlfoto,
                                ],
                            ],
                            'currency' => 'COP',
                            'unit_amount' => $unit_amount,
                        ],
                        'quantity' => $quantity
                    ];
                }
            }
        //Try conexion entre stripe y la aplicacion
            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => $productItems,
                'mode' => 'payment',
                'allow_promotion_codes' => false,
                'metadata' => [
                    'user_id' => $user->id
                ],
                'customer_email' => $user->email,
                'success_url' => route('success') . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('cancel'),
            ]);

        //Catch para los line items del carrito
        }
        catch (\Stripe\Exception\ApiConnectionException $th) {
            return redirect()->back()->with("apiError", "error");
        }
        catch(\Stripe\Exception\InvalidRequestException $e){
            return redirect()->back()->with("noProductos", "error");
        }
        return redirect()->away($checkoutSession->url);
    }
    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                dd('session var no encontrada');
                throw new NotFoundHttpException;
            }
            $this->guardarCarrito($session->id);
            $orden = Orden::where('session_id', $session->id)->first();

            if (!$orden) {
                dd('orden no encontrada');
                throw new NotFoundHttpException;
            }

            if ($orden->estado == "PENDIENTE") {
                $orden->estado = "PAGADO";
                $orden->save();
                Cart::destroy();
            }
        } catch (\Throwable $th) {
            throw new NotFoundHttpException();
        }
        return redirect()->route('carrito_detalles')->with('success', 'success');
    }
    public function cancel()
    {
        return redirect()->back()->with("canceled", "cancelado");
    }


}
