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

    public function total($subtotal)
    {

    }



}
