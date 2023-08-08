<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Orden;

class OrdenProducto extends Model
{
    use HasFactory;

    protected $table = 'orden_productos';
    protected $fillable = [
        'orden_id',
        'product_id',
        'cantidad',
        'precio',
    ];


    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
