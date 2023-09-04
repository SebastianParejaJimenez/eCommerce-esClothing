<?php

namespace App\Models;

use App\Events\OrdenEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Notifications\OrdenNotification;
use Cart;

class Orden extends Model
{
    protected $table = 'ordenes'; // Especifica el nombre real de la tabla

    use HasFactory;
    protected $fillable = [
        'user_id',
        'subtotal',
        'created_at',
        'session_id',
        'estado'
    ];
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'orden_productos')
            ->withPivot(['cantidad', 'precio', 'talla']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guardarCarritoNoPagado($session_id){
        $orden = new Orden();

        $orden->subtotal = str_replace(',', '', Cart::subtotal());
        $orden->user_id = auth()->user()->id;
        $orden->session_id = $session_id;
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
        self::ordenMakeNotification($orden);
        Cart::destroy();
    }

    static function ordenMakeNotification($orden){

        //Ejemplo para conocer si las notificaciones llegan a bd o no
/*         User::where('rol_id', 1)
        ->each(function(User $user) use ($orden){
            $user->notify(new OrdenNotification($orden));
        }); */

        event(new OrdenEvent($orden));
    }
}
